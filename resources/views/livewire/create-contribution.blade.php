<div class="container py-12">

    <div class="text-center mb-12">
        <h1 class="text-gray-800 text-5xl font-bold mb-8">Share Your Story</h1>
        <p class="text-gray-600 text sm:text-lg md:text-xl">Write in your native tongue, and we’ll handle the rest, from translation to illustration. Get published under your name, build an international audience, and even help others learn your language. Full credit, worldwide reach.</p>
    </div>

    <form wire:submit="create" class="mx-auto max-w-3xl">
        {{ $this->form }}
        
        <button type="submit" class="mt-6 btn btn-xl btn-primary">
            Submit
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>
