<?php

namespace Database\Factories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    protected $model = Record::class;

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
            'time' => $this->faker->dateTimeInInterval('-1 day', '+1 day'),
        ];
    }
}
