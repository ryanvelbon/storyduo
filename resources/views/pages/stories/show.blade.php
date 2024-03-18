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
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">{{ $story->author->name }}</h3>
            <p class="text-base leading-7 text-gray-600">Author</p>
            <p class="mt-6 text-base leading-7 text-gray-600">{{ $story->author->bio }}</p>
            <ul role="list" class="mt-6 flex gap-x-6">
                <li>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">X</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M11.4678 8.77491L17.2961 2H15.915L10.8543 7.88256L6.81232 2H2.15039L8.26263 10.8955L2.15039 18H3.53159L8.87581 11.7878L13.1444 18H17.8063L11.4675 8.77491H11.4678ZM9.57608 10.9738L8.95678 10.0881L4.02925 3.03974H6.15068L10.1273 8.72795L10.7466 9.61374L15.9156 17.0075H13.7942L9.57608 10.9742V10.9738Z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
