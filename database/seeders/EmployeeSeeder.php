<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Jikril',
            'nik' => '11131',
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
            'ktp_photo' => '/employee-photo/ktp1.jpeg',
            'blood_type' => 'A',
            'join_date' => '2024-09-04',
            'status' => 'magang',
            'bank' => 'BCA',
            'account_number' => '115437895',
            'bpjs_number' => '7766431',
            'last_education' => 'Diploma',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'plafon' => 3000000,
            'balance' => 0,
            'debt' => 0,
            'location_id' => 1,
            'department_id' => 1,
            'title_id' => 1
        ]);

        Employee::create([
            'name' => 'Farhan',
            'nik' => '11132',
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
            'ktp_photo' => '/employee-photo/ktp1.jpeg',
            'blood_type' => 'A',
            'join_date' => '2024-09-04',
            'status' => 'magang',
            'bank' => 'mandiri',
            'account_number' => '126437875',
            'bpjs_number' => '7766431',
            'last_education' => 'Diploma',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'active_status' => 'active',
            'plafon' => 3000000,
            'balance' => 0,
            'debt' => 0,
            'location_id' => 1,
            'department_id' => 1,
            'title_id' => 1
        ]);

        Employee::create([
            'name' => 'Ardi',
            'nik' => '11133',
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
            'ktp_photo' => '/employee-photo/ktp1.jpeg',
            'blood_type' => 'A',
            'join_date' => '2024-09-04',
            'status' => 'magang',
            'bank' => 'BNI',
            'account_number' => '316436875',
            'bpjs_number' => '7766431',
            'last_education' => 'Diploma',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'active_status' => 'active',
            'plafon' => 3000000,
            'balance' => 0,
            'debt' => 0,
            'location_id' => 2,
            'department_id' => 1,
            'title_id' => 1
        ]);

        Employee::create([
            'name' => 'Haikal',
            'nik' => '11134',
            'email' => 'haikal@gmail.com',
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
            'ktp_photo' => '/employee-photo/ktp1.jpeg',
            'blood_type' => 'A',
            'join_date' => '2024-09-04',
            'status' => 'magang',
            'bank' => 'mandiri',
            'account_number' => '756437875',
            'bpjs_number' => '7766431',
            'last_education' => 'Diploma',
            'education_place' => 'politeknik sukabumi',
            'education_city' => 'sukabumi',
            'graduation_year' => '2025',
            'last_experience' => 'web developer',
            'working_period' => '6',
            'last_title' => 'staff',
            'last_job_description' => 'mengembangkan aplikasi travel berbasis web menggunakan codeigniter',
            'skill' => 'programming',
            'active_status' => 'active',
            'plafon' => 3000000,
            'balance' => 0,
            'debt' => 0,
            'location_id' => 2,
            'department_id' => 1,
            'title_id' => 1
        ]);

        Employee::factory(50)->create();
    }
}
