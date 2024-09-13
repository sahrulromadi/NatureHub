<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $likeableType = fake()->randomElement([Article::class, Campaign::class]);
        $likeableId = $likeableType::inRandomOrder()->first()->id;

        return [
            'likeable_type' => $likeableType,
            'likeable_id' => $likeableId,
            'device_id' => fake()->uuid(),
        ];
    }
}
