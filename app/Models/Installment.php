<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_invoice',
        'installment_number',
        'interest_amount',
        'principal_amount',
        'penalty_amount',
        'total_installment_amount',
        'total_paid_amount',
        'due_date',
        'loan_id',
    ];

    /**
     * Get the user that owns the Installment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function getFormattedInterestAmountAttribute()
    {
        return 'Rp ' . number_format($this->interest_amount, 0, ',', '.');
    }

    public function getFormattedPrincipalAmountAttribute()
    {
        return 'Rp ' . number_format($this->principal_amount, 0, ',', '.');
    }

    public function getFormattedPenaltyAmountAttribute()
    {
        return 'Rp ' . number_format($this->penalty_amount, 0, ',', '.');
    }

    public function getFormattedTotalInstallmentAmountAttribute()
    {
        return 'Rp ' . number_format($this->total_installment_amount, 0, ',', '.');
    }

    public function getFormattedTotalPaidAmountAttribute()
    {
        return 'Rp ' . number_format($this->total_paid_amount, 0, ',', '.');
    }
}
