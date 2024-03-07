@extends('layouts.app')

@section('content')
<div class="bg-gray-800 text-white py-24">
    <div class="container">
        <h1 class="text-5xl font-bold">{{ $story->title }}</h1>
    </div>
</div>
<div>
    <div class="container py-32 prose md:prose-lg lg:prose-xl">
        @forelse($story->segments as $segment)
            <div class="mb-16">
                <div class="mb-8 bg-red-100">
                    {!! $segment->text_lan1 !!}
                </div>
                <div class="bg-blue-100">
                    {!! $segment->text_lan2 !!}
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
