<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Nawaf",
            'email' => 'Nawaf@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => "Nawaf",
            'email' => 'Nawafi@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
    }
}
