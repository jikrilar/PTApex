<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'nik',
        'password',
        'ktp_number',
        'ktp_photo',
        'CV',
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
        'status',
        'bank',
        'join_date',
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
        'location_id',
        'department_id',
        'title_id',
    ];

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
}
