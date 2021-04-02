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
        DB::table('users')->insert([
            'name' => 'Joe Smith',
            'email' => 'joe@gmail.com',
            'password' => Hash::make('qqqqqqqq'),
        ]);
        DB::table('users')->insert([
            'name' => 'Jim Raynor',
            'email' => 'jim.raynor@gmail.com',
            'password' => Hash::make('qqqqqqqq'),
        ]);
    }
}
