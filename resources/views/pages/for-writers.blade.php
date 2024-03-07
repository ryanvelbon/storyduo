@extends('layouts.app')

@section('content')
<style>

</style>

<section class="mx-auto max-w-2xl prose md:prose-lg lg:prose-xl py-24">
    <h2>How to Create Stories with ChatGPT</h2>
    <p>You can create stories and illustrations using ChatGPT.</p>
    <ol>
        <li>
            <h4>Generate the story</h4>
            <p>Enter the following prompt:</p>
            <div class="bg-gray-200 text-gray-700 font-mono px-6 py-4">
                Write an italian story 5 paragraphs long. Supplement each paragraph with the English translation.
            </div>
        </li>
        <li>
            <h4>Generate the illustrations</h4>
            <p>Enter the following prompt:</p>
            <div class="bg-gray-200 text-gray-700 font-mono px-6 py-4">
                Generate an illustration for each paragraph.
            </div>
        </li>
        <li>
            <h4>Generate the meta data</h4>
            <p>Enter the following prompt:</p>
            <div class="bg-gray-200 text-gray-700 font-mono px-6 py-4">
                Suggest a title (Italian) and its English translation. And a SEO meta description for the story.
            </div>
        </li>
    </ol>
</section>
@endsection