<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Knight;
use App\Models\Squire;

class KnightSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 knights
        Knight::factory(10)->create()->each(function ($knight) {
            // Each knight gets 1-3 squires with all required fields
            $squireCount = rand(1, 3);
            
            for ($i = 0; $i < $squireCount; $i++) {
                Squire::create([
                    'name' => fake()->firstName() . ' ' . fake()->lastName(),
                    'age' => fake()->numberBetween(12, 25),
                    'training_level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
                    'knight_id' => $knight->id
                ]);
            }
        });
    }
}