@extends('layouts.app')

@section('content')
<div class="py-6 md:py-12 lg:py-24">
    <div class="container flex flex-col items-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl text-gray-800 font-bold">{{ $story->title }}</h1>
        <div class="mt-4 flex flex-col sm:flex-row flex-wrap items-center gap-x-8 lg:gap-x-32 gap-y-1 overflow-hidden text-sm leading-6 text-gray-600 border border-0 border-t-2 border-gray-600 pt-3 md:px-8">
            <div class="flex flex-col sm:flex-row items-center gap-x-2.5">
                <img src="{{ asset('storage/' . $story->author->avatar) }}" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">
                <span class="tracking-wide">{{ $story->author->name }}</span>
            </div>
            <time datetime="{{ $story->created_at->format('Y-m-d') }}" class="text-gray-800 text-base">{{ $story->created_at->format('M j, Y') }}</time>
            <div class="flex flex-col sm:flex-row items-center gap-x-2.5">
                <span class="tracking-wide">{{ $story->language->name }}</span>
                <img src="{{ asset('img/languages/square/' . $story->language->flag_code . '.png') }}" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">
            </div>
        </div>
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
<div class="bg-gray-200 py-12">
    <div class="mx-auto max-w-3xl py-8 px-4 flex flex-col gap-10 sm:flex-row">
        <img class="w-52 flex-none rounded-full object-cover" src="{{ asset('storage/' . $story->author->avatar) }}" alt="">
        <div class="max-w-xl flex-auto">
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900 hover:text-primary-600">
                <a href="{{ route('users.show', $story->author) }}">
                    {{ $story->author->name }}
                </a>
            </h3>
            <p class="text-base leading-7 text-gray-600">Author</p>
            <p class="mt-6 text-base leading-7 text-gray-600">{{ $story->author->bio }}</p>
            <ul role="list" class="mt-6 flex gap-x-6">
                @if($story->author->sm_twitter)
                    <li>
                        <a href="https://twitter.com/{{ $story->author->sm_twitter }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">X</span>
                            <i class="fa-brands fa-square-x-twitter fa-xl"></i>
                        </a>
                    </li>
                @endif
                @if($story->author->sm_linkedin)
                    <li>
                        <a href="https://www.linkedin.com/in/{{ $story->author->sm_linkedin }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">LinkedIn</span>
                            <i class="fa-brands fa-linkedin fa-xl"></i>
                        </a>
                    </li>
                @endif
                @if($story->author->sm_instagram)
                    <li>
                        <a href="https://www.instagram.com/{{ $story->author->sm_instagram }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">instagram</span>
                            <i class="fa-brands fa-instagram fa-xl"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
