<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::create([
            'name' => 'Jikril',
            'email' => 'muhamad@gmail.com',
            'password' => bcrypt('password'),
            'ktp_number' => '312022036',
            'kk_number' => '312022037',
            'telp' => '081996947657',
            'birthplace' => 'sukabumi',
            'birthdate' => '2003-12-29',
            'address' => 'sukabumi',
            'emergency_contact' => '087879197929',
            'gender' => 'laki-laki',
            'religion' => 'islam',
            'marital_status' => 'lajang',
            'photo' => '/employee-photo/profil1.jpg',
            'ktp_photo' => '/employee-photo/profil1.jpg',
            'CV' => '/CV/cv1.pdf',
            'blood_type' => 'A',
            'status' => 'magang',
            'bank' => 'BCA',
            'account_number' => '115437895',
            'bpjs_number' => '7766431',
            'last_education' => 'D3',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'location_id' => 1,
            'department_id' => 1,
            'title_id' => 1
        ]);

        Candidate::create([
            'name' => 'Farhan',
            'email' => 'farhan@gmail.com',
            'password' => bcrypt('password'),
            'ktp_number' => '312022036',
            'kk_number' => '312022037',
            'telp' => '081996947657',
            'birthplace' => 'sukabumi',
            'birthdate' => '2003-12-29',
            'address' => 'sukabumi',
            'emergency_contact' => '087879197929',
            'gender' => 'laki-laki',
            'religion' => 'islam',
            'marital_status' => 'lajang',
            'photo' => '/employee-photo/profil1.jpg',
            'ktp_photo' => '/employee-photo/profil1.jpg',
            'CV' => '/CV/cv2.pdf',
            'blood_type' => 'A',
            'status' => 'magang',
            'bank' => 'mandiri',
            'account_number' => '126437875',
            'bpjs_number' => '7766431',
            'last_education' => 'D3',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'location_id' => 1,
            'department_id' => 1,
            'title_id' => 1
        ]);

        Candidate::create([
            'name' => 'Ardi',
            'email' => 'ardi@gmail.com',
            'password' => bcrypt('password'),
            'ktp_number' => '312022036',
            'kk_number' => '312022037',
            'telp' => '081996947657',
            'birthplace' => 'sukabumi',
            'birthdate' => '2003-12-29',
            'address' => 'sukabumi',
            'emergency_contact' => '087879197929',
            'gender' => 'laki-laki',
            'religion' => 'islam',
            'marital_status' => 'lajang',
            'photo' => '/employee-photo/profil1.jpg',
            'ktp_photo' => '/employee-photo/profil1.jpg',
            'CV' => '/CV/cv3.pdf',
            'blood_type' => 'A',
            'status' => 'magang',
            'bank' => 'BNI',
            'account_number' => '316436875',
            'bpjs_number' => '7766431',
            'last_education' => 'D3',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'location_id' => 2,
            'department_id' => 1,
            'title_id' => 1
        ]);
    }
}
