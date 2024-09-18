<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaction',
        'transaction_date',
        'amount',
        'invoice',
        'status',
        'category',
        'loan_id',
        'saving_id'
    ];

    /**
     * Get the user that owns the CashBank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function savings(): BelongsTo
    {
        return $this->belongsTo(Saving::class, 'saving_id');
    }

    /**
     * Get the user that owns the CashBank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }
}
