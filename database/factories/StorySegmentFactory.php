<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StorySegmentFactory extends Factory
{
    public function definition()
    {
        return [
            'text_lan1' => fake()->paragraph,
            'text_lan2' => fake()->paragraph,
            'sort' => rand(1,100),
        ];
    }
}
