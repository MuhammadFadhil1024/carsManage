<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John doe admin',
            'email' => 'John@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'John doe office',
            'email' => 'Johnoffice@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'headOffice'
        ]);

        DB::table('users')->insert([
            'name' => 'John doe mine',
            'email' => 'Johnmine@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'headMine'
        ]);
    }
}
