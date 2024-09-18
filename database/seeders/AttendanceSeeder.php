<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::create([
            'attendance_date' => Carbon::now()->toDateString()
        ]);
    }
}
