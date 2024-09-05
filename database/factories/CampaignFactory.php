<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(5);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'content' => fake()->text(500),
            'summary' => fake()->sentence(10),
            'created_at' => fake()->dateTimeThisYear(),
            'user_id' => 1
        ];
    }
}
