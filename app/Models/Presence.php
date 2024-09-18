<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'in_presence_time',
        'out_presence_time',
        'in_presence_photo',
        'out_presence_photo',
        'late_minutes',
        'employee_id',
        'attendance_id'
    ];

    /**
     * Get the employee that owns the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class, 'attendance_id');
    }
}
