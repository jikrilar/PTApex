<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'code' => 'it',
            'name' => 'information technology',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'mkt',
            'name' => 'marketing',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'fa',
            'name' => 'finance and accounting',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'vm',
            'name' => 'visual merchandising',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'opr',
            'name' => 'operation',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'bt',
            'name' => 'boutique',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'cou',
            'name' => 'counter',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'ic',
            'name' => 'internal controller',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'wh',
            'name' => 'warehouse',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'hrd',
            'name' => 'human resource and development',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'mcr',
            'name' => 'merchandise',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'mng',
            'name' => 'management',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'ship',
            'name' => 'shipping',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);

        Department::create([
            'code' => 'tra',
            'name' => 'training',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis corporis similique laboriosam quisquam! Architecto similique ipsum expedita corporis, saepe assumenda deleniti rerum libero error consequuntur deserunt dolorum, officiis eum a.'
        ]);
    }
}
