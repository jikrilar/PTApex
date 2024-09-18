<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->unique()->regexify('[0-9]{5}'),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Anda dapat menyesuaikan password
            'ktp_number' => $this->faker->regexify('[0-9]{16}'),
            // 'ktp_photo' => $this->faker->imageUrl(640, 480, 'people'), // Link ke foto palsu
            'ktp_photo' => '/employee-photo/ktp1.jpeg',
            'kk_number' => $this->faker->regexify('[0-9]{16}'),
            'telp' => $this->faker->phoneNumber,
            'birthplace' => $this->faker->city,
            'birthdate' => $this->faker->date(),
            'address' => $this->faker->address,
            'emergency_contact' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'religion' => $this->faker->randomElement(['islam', 'kristen protestan', 'katolik', 'budha', 'konghucu']),
            'marital_status' => $this->faker->randomElement(['lajang', 'menikah', 'menikah anak 1', 'menikah anak 2', 'menikah anak 3', 'duda atau janda']),
            // 'photo' => $this->faker->imageUrl(640, 480, 'people'), // Link ke foto palsu
            'photo' => '/employee-photo/profil1.jpg',
            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'join_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['karyawan tetap', 'karyawan kontrak', 'magang']),
            'bank' => $this->faker->randomElement(['BCA', 'mandiri', 'maybank', 'BRI', 'BNI', 'CIMB NIAGA', 'hongkong shanghai bank central']),
            'account_number' => $this->faker->regexify('[0-9]{10,16}'),
            'bpjs_number' => $this->faker->regexify('[0-9]{13}'),
            'last_education' => $this->faker->randomElement(['SMA', 'SMK', 'Diploma', 'S1', 'S2']),
            'education_place' => $this->faker->company,
            'education_city' => $this->faker->city,
            'graduation_year' => $this->faker->year,
            'last_experience' => $this->faker->jobTitle,
            'working_period' => $this->faker->randomDigitNotNull(),
            'last_title' => $this->faker->jobTitle,
            'last_job_description' => $this->faker->paragraph,
            'skill' => $this->faker->words(3, true),
            'internal_note' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque cum pariatur voluptatem modi, quo doloremque dolor veniam id temporibus recusandae impedit, dignissimos incidunt asperiores laudantium laborum vero quas amet in!',
            'active_status' => $this->faker->randomElement(['active', 'resign']),
            'plafon' => 3000000,
            'balance' => 0,
            'debt' => 0,
            'location_id' => $this->faker->numberBetween(1, 10),
            'department_id' => $this->faker->numberBetween(1, 14),
            'title_id' => $this->faker->numberBetween(1, 18),
        ];
    }
}
