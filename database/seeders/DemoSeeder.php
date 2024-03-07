<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Story;
use App\Models\StorySegment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::factory()->create();

        Story::factory(10)
            ->has(StorySegment::factory()->count(10), 'segments')
            ->create([
                'author_id' => $author->id,
            ]);
    }
}
