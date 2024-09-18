<?php

namespace App\Exports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CandidateExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Candidate::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'password',
            'CV',
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
            'location_id',
            'department_id',
            'title_id',
        ];
    }
}
