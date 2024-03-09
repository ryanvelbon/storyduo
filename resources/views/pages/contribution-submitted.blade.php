@extends('layouts.app')

@section('content')
<section class="py-32">
    <div class="flex flex-col space-y-8 items-center">
        <h2 class="text-5xl font-bold text-primary-500">Thank you</h2>
        <p class="text-2xl text-gray-700">Your story has been submitted and is pending review by our Editing team.</p>
        <a href="{{ route('contributions.create') }}" class="btn btn-xl btn-primary">Write another story</a>
    </div>
</section>
@endsection
