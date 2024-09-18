<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Title::create([
            'name' => 'staff'
        ]);

        Title::create([
            'name' => 'sales associate'
        ]);

        Title::create([
            'name' => 'supervisor'
        ]);

        Title::create([
            'name' => 'manager'
        ]);

        Title::create([
            'name' => 'senior manager'
        ]);

        Title::create([
            'name' => 'direktur'
        ]);

        Title::create([
            'name' => 'clerk'
        ]);

        Title::create([
            'name' => 'executive'
        ]);

        Title::create([
            'name' => 'area manager'
        ]);

        Title::create([
            'name' => 'assistent manager'
        ]);

        Title::create([
            'name' => 'store manager'
        ]);

        Title::create([
            'name' => 'assistent supervisor'
        ]);

        Title::create([
            'name' => 'area supervisor'
        ]);

        Title::create([
            'name' => 'dealer'
        ]);

        Title::create([
            'name' => 'sekretaris direksi'
        ]);

        Title::create([
            'name' => 'satpam/security'
        ]);

        Title::create([
            'name' => 'general manager'
        ]);

        Title::create([
            'name' => 'retail senior manager'
        ]);
    }
}
