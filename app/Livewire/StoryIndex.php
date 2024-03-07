<?php

namespace App\Livewire;

use App\Models\Story;
use Livewire\Component;

class StoryIndex extends Component
{
    public function render()
    {
        $stories = Story::all();

        return view('livewire.story-index', [
            'stories' => $stories,
        ]);
    }
}
