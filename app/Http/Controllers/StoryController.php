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
            'language' => $language,
        ]);
    }

    public function show(Story $story)
    {
        return view('pages.stories.show', [
            'story' => $story,
        ]);
    }

    public function random(Language $language)
    {
        $story = Story::where('language_id', $language->id)
                    ->inRandomOrder()
                    ->firstOrFail();

        return redirect()->route('stories.show', $story);
    }
}
