@extends('layouts.app')

@section('content')
    <div class="bg-gray-300 py-16 mb-12">
        <div class="flex items-center gap-12 container">
            <img src="{{ asset('img/languages/square/' . $language->flag_code . '.png') }}" class="rounded-full w-20 h-20">
            <div>
                <h2 class="text-5xl text-gray-500 font-bold text-center mb-8">{{ $language->name }} Stories</h2>
                <a href="{{ route('stories.random', $language) }}" class="btn btn-secondary">Random story</a>
            </div>
        </div>
    </div>
    <section class="container">
        @forelse($stories as $story)
            <div class="flex flex-col gap-10 sm:flex-row items-center mb-24 mx-auto max-w-4xl">
                @if($story->feat_img)
                    <img class="w-64 h-64 flex-none rounded-full object-cover" src="{{ asset('storage/' . $story->feat_img) }}" alt="">
                @else
                    <img class="w-64 h-64 flex-none rounded-full object-cover" src="https://placehold.co/300" alt="">
                @endif
                <div class="max-w-xl flex-auto my-auto text-center sm:text-left space-y-4">
                    <a href="{{ route('stories.show', $story) }}">
                        <h3 class="text-gray-800 hover:text-primary-500 text-3xl font-bold">{{ $story->title }}</h3>
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
        <div>
            {{ $stories->links() }}
        </div>
    </section>
@endsection