<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Schema::disableForeignKeyConstraints();

        DB::table('titles')->truncate();
        DB::table('departments')->truncate();
        DB::table('locations')->truncate();
        DB::table('employees')->truncate();
        DB::table('candidates')->truncate();
        DB::table('attendances')->truncate();

        Schema::enableForeignKeyConstraints();

        $this->call(TitleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
