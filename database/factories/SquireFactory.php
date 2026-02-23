<?php

namespace Database\Factories;

use App\Models\Squire;
use App\Models\Knight;
use Illuminate\Database\Eloquent\Factories\Factory;

class SquireFactory extends Factory
{
    protected $model = Squire::class;

    public function definition(): array
    {
        $trainingLevels = ['beginner', 'intermediate', 'advanced'];
        
        return [
            'name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'age' => $this->faker->numberBetween(12, 25),
            'training_level' => $this->faker->randomElement($trainingLevels),
            'knight_id' => Knight::factory(), // This will create a knight if not provided
        ];
    }
}