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
        $authors = User::factory(20)->create();

        for ($i=0; $i <500 ; $i++) {
            Story::factory()
                ->has(StorySegment::factory()->count(rand(3,10)), 'segments')
                ->create([
                    'author_id' => $authors->random()->id,
                ]);
        }
    }
}
