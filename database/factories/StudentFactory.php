<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'studentId' => $this->faker->word(),
            'email' => $this->faker->email(),
            'gender' => $this->faker->titleMale(),
            'dob' => $this->faker->date(),
            'course_id' => $this->faker->numberBetween(1.5, 80.5)
        ];
    }
}
