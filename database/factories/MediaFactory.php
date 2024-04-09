<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'path' => $this->faker->word,
            'category_id' => null,
            'image_uri' => $this->faker->word,
            'thumbnail_uri' => $this->faker->word,
            'duration' => $this->faker->randomNumber(),
        ];
    }


}
