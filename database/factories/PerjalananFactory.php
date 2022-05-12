<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perjalanan>
 */
class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => 1,
            // 'id_user' => $this->faker->randomDigitNotNull(),
            'lokasi' => $this->faker->city(),
            'suhu' => $this->faker->randomFloat(1, 30, 45),
            'tanggal' => $this->faker->date(),
            'jam' => $this->faker->time(),
        ];
    }
}
