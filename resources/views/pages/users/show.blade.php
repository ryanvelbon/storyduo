@extends('layouts.app')

@section('content')
<section class="px-6 lg:px-8">
    <div class="mx-auto max-w-4xl py-16">
        <div class="flex gap-12 flex-col md:flex-row items-center md:items-start">
            <div class="w-64">
                <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-full">
            </div>
            <div class="space-y-4 text-center md:text-left">
                <h2 class="text-gray-800 text-4xl font-bold">{{ $user->name }}</h2>
                <p>{{ $user->bio }}</p>
                <ul role="list" class="mt-6 flex gap-x-6">
                    @if($user->sm_twitter)
                        <li>
                            <a href="https://twitter.com/{{ $user->sm_twitter }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">X</span>
                                <i class="fa-brands fa-square-x-twitter fa-xl"></i>
                            </a>
                        </li>
                    @endif
                    @if($user->sm_linkedin)
                        <li>
                            <a href="https://www.linkedin.com/in/{{ $user->sm_linkedin }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">LinkedIn</span>
                                <i class="fa-brands fa-linkedin fa-xl"></i>
                            </a>
                        </li>
                    @endif
                    @if($user->sm_instagram)
                        <li>
                            <a href="https://www.instagram.com/{{ $user->sm_instagram }}" target="_blank" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">instagram</span>
                                <i class="fa-brands fa-instagram fa-xl"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-xl">
        <ul class="space-y-12 mb-8">
            @forelse($user->stories as $story)
                <li>
                    <a href="{{ route('stories.show', $story) }}" wire:navigate>
                        <div class="group hover:bg-gray-100 p-5 transition ease-in-out duration-500">
                            <h3 class="mb-2 text-2xl font-bold text-gray-800 group-hover:text-primary-600 transition ease-in-out duration-500">{{ $story->title }}</h3>
                            <p>{{ $story->description }}</p>
                        </div>
                    </a>
                </li>
            @empty
                <div>This user hasn't published any stories yet.</div>
            @endforelse
        </ul>
    </div>
</section>
@endsection