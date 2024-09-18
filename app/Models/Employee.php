<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    use HasFactory;

    protected $fillable = [
        'name',
        'nik',
        'email',
        'password',
        'ktp_number',
        'ktp_photo',
        'kk_number',
        'telp',
        'birthplace',
        'birthdate',
        'address',
        'emergency_contact',
        'gender',
        'religion',
        'marital_status',
        'photo',
        'blood_type',
        'join_date',
        'status',
        'bank',
        'account_number',
        'bpjs_number',
        'last_education',
        'education_place',
        'education_city',
        'graduation_year',
        'last_experience',
        'working_period',
        'last_title',
        'last_job_description',
        'skill',
        'active_status',
        'resign_date',
        'resign_description',
        'internal_note',
        'plafon',
        'balance',
        'debt',
        'location_id',
        'department_id',
        'title_id',
    ];

    public function presence(): HasMany
    {
        return $this->hasMany(Presence::class, 'employee_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(Title::class, 'title_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function getFormattedPlafonAttribute()
    {
        return 'Rp ' . number_format($this->plafon, 0, ',', '.');
    }

    public function getFormattedDebtAttribute()
    {
        return 'Rp ' . number_format($this->debt, 0, ',', '.');
    }
}
