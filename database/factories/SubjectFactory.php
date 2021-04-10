<?php

namespace Database\Factories;

use App\Models\Subject;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'description' => $this->faker->optional()->sentence(),
            'subject_code' => $this->faker->bothify($string = 'IK-SSS###'),
            'credit_value'=>$this->faker->randomDigitNotNull,
            'user_id' => User::where('is_teacher', '=', '1')->get()->random()->id
        ];
    }
}
