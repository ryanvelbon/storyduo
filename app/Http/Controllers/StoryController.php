<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $cacheKey = 'all_stories_for_language_' . $language->id;

        $stories = Cache::rememberForever($cacheKey, function () use ($language) {
            return Story::where('language_id', $language->id)->get();
        });

        if ($stories->isEmpty()) {
            abort(404);
        }

        $story = $stories->random();

        return redirect()->route('stories.show', $story);
    }
}
