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
        return [
            'name' => $this->faker->firstName(),
            'description' => $this->faker->sentence(),
            'student_name' => $user->name,
            'student_email'=> $user->email,
            'earned_points' => $this->faker->randomDigitNotNull,
            'task_id' => Task::all()->random()->id,
            'submitted_time' =>$this->faker->dateTime($max = 'now', $timezone = null),
            'evaluated_time' =>$this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
