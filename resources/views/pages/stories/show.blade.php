@extends('layouts.app')

@section('content')
<div class="py-6 md:py-12 lg:py-24">
    <div class="container flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl text-gray-800 font-bold">{{ $story->title }}</h1>
        <p class="mt-4 tracking-wide text-center">Gianluca Viatelli</p>
    </div>
</div>
<div>
    <div class="prose md:prose-lg lg:prose-xl mx-auto max-w-3xl px-4 py-2 md:py-8">
        @forelse($story->segments as $segment)
            <div class="mb-16">
                @if($segment->img)
                    <img src="{{ asset('storage/' . $segment->img) }}" class="h-96 mx-auto">
                @endif
                <div class="mb-8 font-serif">
                    {!! $segment->text_lan1 !!}
                </div>
                <div x-data="{ open: false }">

                    <button x-show="!open" @click="open = true" class="btn btn-sm btn-muted block mx-auto">Show translation</button>

                    <div x-show="open" x-transition class="mt-6 bg-gray-100 rounded-2xl px-8 py-6 text-sm md:text-base">
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
