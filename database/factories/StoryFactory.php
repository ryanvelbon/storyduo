<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoryFactory extends Factory
{
    public function definition()
    {
        $title = fake()->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph,
            'published' => true,
        ];
    }
}
