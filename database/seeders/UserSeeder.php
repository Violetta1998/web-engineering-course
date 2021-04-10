<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
        'name' => 'Joe Smith',
        'email' => 'joe.smith@gmail.com',
        'password' => Hash::make('qqqqqqqq'),
        'is_teacher' => 1
        ]);
        User::create([
        'name' => 'Jim Raynor',
        'email' => 'jim.raynor@gmail.com',
        'password' => Hash::make('qqqqqqqq'),
        'is_teacher' => 1
        ]);
        User::create([
        'name' => 'Violetta Firyaridi',
        'email' => 'violettaff@gmail.com',
        'password' => Hash::make('12345678'),
        'is_teacher' => 1
        ]);
        User::create([
            'name' => 'Maria Ivanova',
            'email' => 'maria.ivanova@gmail.com',
            'password' => Hash::make('12345678'),
            'is_teacher' => 0
        ]);
    }
}
