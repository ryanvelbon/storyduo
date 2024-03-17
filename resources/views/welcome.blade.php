@extends('layouts.app')

@section('content')
<section class="bg-gray-900">
    <div class="relative isolate overflow-hidden pt-14">
        <img src="{{ asset('img/bg1.jpg') }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-white/20"></div>
        <div class="mx-auto max-w-3xl py-24 sm:py-32 lg:py-48 px-2">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl bg-black py-4">Learn a New Language</h1>
                <span class="bg-white text-gray-800 text-2xl -rotate-30 px-2 sm:px-12 font-mono">with short stories</span>
                <p class="mt-6 text-lg leading-8 text-gray-800 font-serif">
                    <span class="bg-white/80">A collection of stories written by a community of native speakers helping each other learn foreign languages through storytelling.</span>
                </p>
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="#" class="btn btn-xl btn-primary">Read a story</a>
                    <a href="{{ route('contributions.create') }}" class="btn btn-xl bg-white text-black hover:text-gray-800">Write a story <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
