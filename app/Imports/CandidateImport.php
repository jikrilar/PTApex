<?php

namespace App\Imports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;

class CandidateImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Candidate([
            'name' => $row[0],
            'email' => $row[1],
            'password' => $row[2],
            'ktp_number' => $row[3],
            'ktp_photo' => $row[4],
            'CV' => $row[5],
            'kk_number' => $row[6],
            'telp' => $row[7],
            'birthplace' => $row[8],
            'birthdate' => $row[9],
            'address' => $row[10],
            'emergency_contact' => $row[11],
            'gender' => $row[12],
            'religion' => $row[13],
            'marital_status' => $row[14],
            'photo' => $row[15],
            'blood_type' => $row[16],
            'status' => $row[17],
            'bank' => $row[18],
            'account_number' => $row[19],
            'bpjs_number' => $row[20],
            'last_education' => $row[21],
            'education_place' => $row[22],
            'education_city' => $row[23],
            'graduation_year' => $row[24],
            'last_experience' => $row[25],
            'working_period' => $row[26],
            'last_title' => $row[27],
            'last_job_description' => $row[28],
            'skill' => $row[29],
            'location_id' => (int) $row[30],
            'department_id' => (int) $row[31], // Casting to integer
            'title_id' => (int) $row[32],
        ]);
    }
    public function rules(): array
    {
        return [
            'location_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title_id' => 'required|integer',
        ];
    }
}
