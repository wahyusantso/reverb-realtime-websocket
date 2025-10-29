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
            'nim' => $this->faker->unique()->numerify('###########'), // 12 digit
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(18, 25),
            'address' => $this->faker->address(),
            'major' => $this->faker->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Elektro']),
        ];
    }
}
