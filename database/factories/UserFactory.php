<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->firstName() . ' ' . fake()->lastName(),
            'username' => fake()->userName(),
            'language_id' => rand(1,10),
            'bio' => fake()->text(160),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'sm_instagram' => rand(1,10) > 3 ? fake()->userName() : null,
            'sm_linkedin' => rand(1,10) > 3 ? fake()->userName() : null,
            'sm_twitter' => rand(1,10) > 3 ? fake()->userName() : null,

        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
