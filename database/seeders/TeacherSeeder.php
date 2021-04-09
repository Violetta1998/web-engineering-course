<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
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
        ]);
        User::create([
        'name' => 'Jim Raynor',
        'email' => 'jim.raynor@gmail.com',
        'password' => Hash::make('qqqqqqqq'),
        ]);
        User::create([
        'name' => 'Violetta Firyaridi',
        'email' => 'violettaff@gmail.com',
        'password' => '12345678',
        ]);
    }
}
