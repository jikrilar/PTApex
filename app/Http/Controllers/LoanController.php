<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\TempLoan;
use App\Models\Installment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $loans = Auth::guard('employee')->check()
            ? Loan::where('employee_id', Auth::guard('employee')->id())->paginate(5)
            : Loan::paginate(5);


        return view('loan.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        return view('loan.create', [
            'employee' => Employee::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required',
            'installment' => 'required',
            'note' => 'required',
            'invoice' => 'required',
        ]);

        if ($request->hasFile('invoice')) {
            $invoicePath = $request->file('invoice')->store('invoices', 'public');
            $data['invoice'] = "/storage/{$invoicePath}";
        }

        $employee_id = Auth::guard('employee')->check() ? Auth::guard('employee')->id() : $request->employee_id;

        $data['transaction_date'] = Carbon::now()->toDateString();
        $data['no_transaction'] = 'P' . Str::random(4) . Employee::find($employee_id)->value('nik') . Carbon::now()->format('Ymd');
        $data['account_number'] = Employee::find($employee_id)->value('account_number');
        $data['employee_id'] = $employee_id;

        $employee = Employee::find($employee_id);

        if ($request->amount > $employee->plafon) {
            Alert::error('failed!', "Jumlah peminjaman melebihi plafon (Rp. {$employee->plafon})");
            return redirect()->back();
        }

        // Logika perhitungan bunga dan cicilan bulanan
        $amount = $request->amount;
        $installment = $request->installment;

        switch ($installment) {
            case 3:
                $interestRate = 0.02; // 2% untuk 3 bulan
                break;
            case 6:
                $interestRate = 0.04; // 4% untuk 6 bulan
                break;
            case 12:
                $interestRate = 0.06; // 6% untuk 12 bulan
                break;
            default:
                $interestRate = 0; // default untuk cicilan 1X
                break;
        }

        // Hitung total bunga
        $interestAmount = $amount * $interestRate;

        // Hitung total pinjaman yang harus dibayar
        $totalLoan = $amount + $interestAmount;

        // Tambahkan hasil perhitungan ke dalam data yang disimpan
        $data['interest_rate'] = $interestRate * 100; // simpan dalam bentuk persen
        $data['amount_with_interest'] = $totalLoan;
        $data['status_installment'] = 'in_progress';

        if (Auth::guard('employee')->check()) {
            TempLoan::create($data);
        } else {
            $loan = Loan::create($data);

            $employee->update([
                'debt' => $employee->debt + $totalLoan
            ]);

            // Generate cicilan berdasarkan jumlah cicilan
            $this->generateInstallments($loan, $totalLoan);
        }

        Alert::success('success!', "Berhasil menambahkan simpanan atas nama {$employee->name}");
        return redirect()->route('loan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('loan.show', [
            'loan' => Loan::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('loan.edit', [
            'loan' => Loan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function selectEmployee()
    {
        return view('loan.select-employee', [
            'employees' => Employee::where('active_status', 'active')->paginate(5)
        ]);
    }

    public function approveLoan($id)
    {
        $tempLoan = TempLoan::findOrFail($id);

        // Buat data loan dari temporary loan
        $loan = new Loan();
        $loan->no_transaction = $tempLoan->no_transaction;
        $loan->transaction_date = $tempLoan->transaction_date;
        $loan->amount = $tempLoan->amount;
        $loan->invoice = $tempLoan->invoice;
        $loan->installment = $tempLoan->installment;
        $loan->interest_rate = $tempLoan->interest_rate;
        $loan->amount_with_interest = $tempLoan->amount_with_interest;
        $loan->employee_id = $tempLoan->employee_id;
        $loan->status_installment = $tempLoan->status_installment;
        $loan->note = $tempLoan->note;

        $loan->save();

        $employee = Employee::find($tempLoan->employee_id);

        $employee->update([
            'debt' => $employee->debt + $tempLoan->total_with_interest
        ]);

        // Hapus temporary loan setelah approval
        $tempLoan->delete();

        return redirect()->route('loans.index')->with('success', 'Pinjaman berhasil disetujui.');
    }

    protected function generateInstallments($loan, $totalLoan)
    {
        // Hitung pokok dan bunga per cicilan
        $installmentAmount = $totalLoan / $loan->installment;
        $principalAmount = $loan->amount / $loan->installment;
        $interestAmount = ($totalLoan - $loan->amount) / $loan->installment;

        for ($i = 1; $i <= $loan->installment; $i++) {
            // Tentukan tanggal jatuh tempo, misal setiap bulan dari tanggal pinjaman
            $dueDate = Carbon::now()->addMonths($i);

            // Buat entri baru untuk cicilan
            Installment::create([
                'loan_id' => $loan->id,
                'installment_number' => $i,
                'principal_amount' => $principalAmount, // tagihan pokok
                'interest_amount' => $interestAmount, // tagihan bunga
                'penalty_amount' => 0, // Denda awalnya 0
                'total_installment_amount' => $installmentAmount, // tagihan total
                'total_paid_amount' => 0, // Total terbayarkan awalnya 0
                'due_date' => $dueDate,
            ]);
        }
    }

}
