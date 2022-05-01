<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models= User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birthdate' => $this->faker->dateTimeBetween('-42 years', '-12 years'),
        ];
    }
}
