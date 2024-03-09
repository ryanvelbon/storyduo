<div class="container py-12">

    <h1 class="text-gray-800 text-7xl font-bold mb-12">Tell your story!</h1>

    <form wire:submit="create" class="mx-auto max-w-3xl">
        {{ $this->form }}
        
        <button type="submit" class="mt-6 btn btn-xl btn-primary">
            Submit
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>
