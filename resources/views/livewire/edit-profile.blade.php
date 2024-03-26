<div class="container py-12">

    <div class="text-center mb-12">
        <h1 class="text-gray-800 text-5xl font-bold mb-8">Edit your profile</h1>
        <p class="text-gray-600 text sm:text-lg md:text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

    <form wire:submit="update" class="mx-auto max-w-3xl">
        {{ $this->form }}
        
        <button type="submit" class="mt-6 btn btn-xl btn-primary">
            Save changes
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>
