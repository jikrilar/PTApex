<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendance_date'
    ];

    public function presence(): HasMany
    {
        return $this->hasMany(Presence::class, 'attendance_id');
    }
}
