<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(Language $language)
    {
        $stories = Story::query()
            ->published()
            ->where('language_id', $language->id)
            ->paginate(10);

        return view('pages.stories.index', [
            'stories' => $stories,
        ]);
    }

    public function show(Story $story)
    {
        return view('pages.stories.show', [
            'story' => $story,
        ]);
    }
}
