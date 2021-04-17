<?php

namespace Database\Factories;

use App\Models\Solution;
use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('is_teacher', '=', '0')->get()->random();
        $task = Task::all()->random();

        return [
            'student_name' => $user->name,
            'student_email'=> $user->email,
            'earned_points' => ($task->points)-random_int(0, $task->points),
            'task_id' => $task->id,
            'submitted_time' =>$this->faker->dateTime($max = 'now', $timezone = null),
            'evaluated_time' =>$this->faker->optional()->dateTime($max = 'now', $timezone = null),
            'solution_text'=> $this->faker->sentence()
        ];
    }
}
