@extends('layouts.app')

@section('content')
<section class="bg-gray-900">
    <div class="relative isolate overflow-hidden pt-14">
        <img src="{{ asset('img/bg1.jpg') }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-white/20"></div>
        <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56 px-2">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl bg-black py-4">Learn a New Language</h1>
                <span class="bg-white text-gray-800 text-2xl -rotate-30 px-2 sm:px-12 font-mono">with short stories</span>
                <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="#" class="btn btn-xl btn-primary">Start Learning</a>
                    <a href="#" class="btn btn-xl text-white hover:bg-white/40">Write a story <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
