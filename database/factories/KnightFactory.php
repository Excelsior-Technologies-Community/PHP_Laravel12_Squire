<?php

namespace Database\Factories;

use App\Models\Knight;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnightFactory extends Factory
{
    protected $model = Knight::class;

    public function definition(): array
    {
        $titles = ['Sir', 'Lord', 'Baron', 'Duke', 'Count', 'Baronet'];
        $weapons = ['Longsword', 'Battle Axe', 'Lance', 'War Hammer', 'Greatsword', 'Morning Star'];

        return [
            'name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'age' => $this->faker->numberBetween(25, 60),
            'title' => $this->faker->randomElement($titles),
            'weapon' => $this->faker->randomElement($weapons),
            'experience_years' => $this->faker->numberBetween(5, 40),
        ];
    }
}