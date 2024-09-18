<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstallmentController extends Controller
{
    public function index()
    {
        $loan_employee = Loan::where('employee_id', Auth::guard('employee')->id())->pluck('id');

        $installments = Auth::guard('employee')->check()
            ? Installment::whereIn('loan_id', $loan_employee)->paginate(5)
            : Installment::paginate(5);

        return view('installment.index', compact('installments'));
    }


    public function loanPaymentForm($installment_id)
    {
        return view('installment.payment', [
            'installment' => Installment::find($installment_id)
        ]);
    }

    public function loanPayment(Request $request, $installment_id)
    {
        $request->validate([
            'paid_amount' => 'required',
            'invoice' => 'required'
        ]);

        Installment::find($installment_id);
    }
}
