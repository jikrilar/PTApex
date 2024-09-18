<?php

namespace App\Http\Controllers;

use App\Models\CashBank;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\TempCashBank;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CashBankController extends Controller
{
    public function index()
    {
        return view('cashbank.index', [
            'cashbanks' => CashBank::paginate(5)
        ]);
    }

    public function loanPaymentForm($loan_id)
    {
        return view('cashbank.loan-payment', [
            'loan' => Loan::find($loan_id)
        ]);
    }

    public function loanPayment(Request $request, $loan_id)
    {
        $loan = Loan::findOrFail($loan_id);

        $data = $request->validate([
            'amount' => 'required',
            'invoice' => 'required',
        ]);

        if ($request->hasFile('invoice')) {
            $invoicePath = $request->file('invoice')->store('invoices', 'public');
            $data['invoice'] = $invoicePath;
        }

        // Cek apakah cicilan sudah mencapai atau melebihi jumlah yang ditentukan
        if ($loan->paid_installments >= $loan->installment) {
            Alert::error('failed!', 'Jumlah cicilan sudah mencapai batas yang ditentukan.');
            return redirect()->back();
        }

        // Update jumlah sisa hutang dan jumlah cicilan yang telah dibayar
        $loan->remaining_debt -= $data['amount'];
        $loan->paid_installments += 1;

        // Cek apakah hutang sudah lunas
        if ($loan->remaining_debt <= 0) {
            $loan->remaining_debt = 0;
            $loan->status = 'paid'; // Tandai pinjaman sebagai lunas
        }

        $data['transaction_date'] = Carbon::now()->toDateString();

        $data['status'] = 'approve';

        $data['category'] = 'income';

        $data['loan_id'] = $loan_id;

        $data['no_transaction'] = 'CL' . Loan::find($loan_id)->value('no_transaction') . Carbon::now()->toDateString();

        $loan = Loan::find($loan_id);

        CashBank::create($data);

        if (Auth::guard('admin')->check()) {
            CashBankController::create($data);
        } else {
            TempCashBank::create($data);
        }

        $loan->update([
            'remaining_debt' => $loan->remaining_debt - $request->amount
        ]);

        Alert::success("pembayaran pinjaman senilai Rp. {$request->amount} berhasil", "sisa pinjaman yang tersisa adalah Rp. {$loan->remaining_debt}");
        return redirect()->route('cashbank-loan', $loan_id);
    }

    public function generateReceipt($loan_id)
    {
        // Ambil data pinjaman berdasarkan ID
        $loan = Loan::findOrFail($loan_id);
        $employee = Employee::findOrFail($loan->employee_id);

        return view('receipt.loan', [
            'loan' => $loan,
            'employee' => $employee,
            'date' => Carbon::now()->format('d/m/Y')
        ]);
    }

    public function importReceipt($loan_id)
    {
        // Ambil data pinjaman berdasarkan ID
        $loan = Loan::findOrFail($loan_id);
        $employee = Employee::findOrFail($loan->employee_id);

        // Data yang akan dikirimkan ke view
        $data = [
            'loan' => $loan,
            'employee' => $employee,
            'date' => Carbon::now()->format('d/m/Y'), // Format tanggal saat ini
        ];

        // Load view struk pembayaran
        $pdf = Pdf::loadView('receipt/loan', $data);

        // Set nama file dan download sebagai PDF
        return $pdf->download("receipt-{$loan->no_transaction}.pdf");
    }

}
