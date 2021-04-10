<?php

namespace Database\Seeders;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->truncate();
        Subject::factory()->count(10)->create();

        $subjects = Subject::all();
        foreach($subjects as $subject){
            $user = User::where('is_teacher', '=', '0')->get()->random();
            $user->student_subjects()->attach($subject);
        }

    }
}
