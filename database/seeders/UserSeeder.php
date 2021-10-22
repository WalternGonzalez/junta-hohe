<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

       'name' => 'Walter Gonzalez',
       'email' => 'walter@walter',
       'password' => bcrypt('walter123')      
        ])->assignRole('Admin');

        User::factory(99)->create();
    }

}
