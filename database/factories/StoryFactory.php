<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoryFactory extends Factory
{
    public function definition()
    {
        $title = rtrim(fake()->sentence(4), '.');

        return [
            'language_id' => rand(1,10),
            'title' => $title,
            'title_en' => rtrim(fake()->sentence(4), '.'),
            'slug' => Str::slug($title),
            'description' => fake()->paragraph,
            'published' => true,
        ];
    }
}
