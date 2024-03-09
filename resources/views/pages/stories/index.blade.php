@extends('layouts.app')

@section('content')
    <section class="container py-32">
        @forelse($stories as $story)
            <div class="flex flex-col gap-10 sm:flex-row items-center mb-24 mx-auto max-w-4xl">
                @if($story->feat_img)
                    <img class="w-64 h-64 flex-none rounded-full object-cover" src="{{ asset('storage/' . $story->feat_img) }}" alt="">
                @else
                    <img class="w-64 h-64 flex-none rounded-full object-cover" src="https://placehold.co/300" alt="">
                @endif
                <div class="max-w-xl flex-auto my-auto text-center sm:text-left space-y-4">
                    <a href="{{ route('stories.show', $story) }}">
                        <h3 class="text-primary-600 hover:text-primary-500 text-3xl font-bold font-serif text-gray-800">{{ $story->title }}</h3>
                    </a>
                    <p class="uppercase text-gray-500 text-lg tracking-widest">{{ $story->title_en }}</p>
                    <p class="prose md:prose-lg lg:prose-xl font-serif">{!! $story->description !!}</p>
                    <div class="flex items-center h-16">
                        <a href="{{ route('stories.show', $story) }}" class="btn btn-xl bg-gray-200 hover:bg-gray-300 text-gray-600 uppercase">Read more</a>
                    </div>
                </div>
            </div>
        @empty
            <div>
                No results.
            </div>
        @endforelse
    </section>
@endsection