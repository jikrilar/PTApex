<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Saving;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('savings-loan.savings.index', [
            'savings' => Saving::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        return view('savings-loan.savings.create', [
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
            'note' => 'required',
        ]);

        $employee_id = Auth::guard('employee')->check() ? Auth::user()->id : $request->employee_id;

        $data['transaction_date'] = Carbon::now()->toDateString();

        $data['no_transaction'] = 'S' . $request->employee_id . Carbon::now()->toDateString();

        $data['employee_id'] = $employee_id;

        Saving::create($data);

        $employee = Employee::where('nik', $request->employee_id)->first();

        $update_balance = $employee->balance + $request->amount;

        Employee::where('nik', $request->employee_id)->update([
            'balance' => $update_balance
        ]);

        Alert::success('success!', "berhasil menambahkan simpanan atas nama {$employee->name}");
        return redirect()->route('savings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
