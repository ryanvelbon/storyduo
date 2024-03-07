@extends('layouts.app')

@section('content')
<div class="bg-gray-800 text-white py-24">
    <div class="container">
        <h1 class="text-5xl font-bold">{{ $story->title }}</h1>
    </div>
</div>
<div>
    <div class="py-32 prose md:prose-lg lg:prose-xl mx-auto max-w-3xl">
        @forelse($story->segments as $segment)
            <div class="mb-16">
                <div class="mb-8 font-serif">
                    {!! $segment->text_lan1 !!}
                </div>
                <div x-data="{ open: false }">
                    <button @click="open = ! open" x-text="open ? 'Hide' : 'Show'" class="btn btn-secondary"></button>

                    <div x-show="open" x-transition class="mt-6 bg-gray-200 rounded-2xl px-8 py-6">
                        {!! $segment->text_lan2 !!}
                    </div>
                </div>
            </div>
        @empty
            <div>
                Failed to load story.
            </div>
        @endforelse
    </div>
</div>
@endsection
