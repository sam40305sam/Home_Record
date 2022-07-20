<?php

namespace Database\Factories;

use App\Models\RecordD;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecordD>
 */
class RecordDFactory extends Factory
{
    protected $model = RecordD::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'temperature' => $this->faker->randomFloat(2, 20, 30),
            'humidity' => $this->faker->randomFloat(2, 20, 30),
            'numbers' => $this->faker->randomDigitNotNull(),
            'time' => $this->faker->dateTimeInInterval('-1 day', '+1 day'),
        ];
    }
}
