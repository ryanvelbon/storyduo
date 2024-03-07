<div>
    <section class="container py-16">
        @forelse($stories as $story)
            <a href="{{ route('stories.show', $story) }}" wire:navigate>
                <div class="px-6 py-4">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $story->title }}</h3>
                    <p>{{ $story->description }}</p>
                </div>
            </a>
        @empty
            <div>
                No results.
            </div>
        @endforelse
    </section>
</div>
