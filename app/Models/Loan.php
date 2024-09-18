<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaction',
        'transaction_date',
        'amount',
        'remaining_debt',
        'invoice',
        'interest_rate',
        'installment',
        'amount_with_interest',
        'status',
        'note',
        'employee_id',
    ];


    /**
     * Get the user that owns the Loan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    // public function getFormattedRemainingDebtAttribute()
    // {
    //     return 'Rp ' . number_format($this->remaining_debt, 0, ',', '.');
    // }

    // public function getFormattedMontlyInstallmentAttribute()
    // {
    //     return 'Rp ' . number_format($this->monthly_installment, 0, ',', '.');
    // }

    // public function getFormattedInterestAmountAttribute()
    // {
    //     return 'Rp ' . number_format($this->interest_amount, 0, ',', '.');
    // }

    public function getFormattedAmountWithInterestAttribute()
    {
        return 'Rp ' . number_format($this->amount_with_interest, 0, ',', '.');
    }
}
