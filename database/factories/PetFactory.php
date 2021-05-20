<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'species' => $this->faker->word(),
            'date_of_birth' => $this->faker->dateTime($max = 'now', $timezone = null),
            'date_of_death' => $this->faker->optional()->dateTimeThisYear($max = 'now', $timezone = null),
            'note' => $this->faker->sentence()
        ];
    }
}
