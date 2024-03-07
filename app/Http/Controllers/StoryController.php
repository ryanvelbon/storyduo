<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function show(Story $story)
    {
        return view('pages.stories.show', [
            'story' => $story,
        ]);
    }
}
