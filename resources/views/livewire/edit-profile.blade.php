<div class="container py-12">

    <form wire:submit="update" class="mx-auto">
        <div class="flex justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Edit your profile</h2>
            <div class="gap-2">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="" class="btn btn-muted">View profile</a>
            </div>
        </div>
        {{ $this->form }}
    </form>
    
    <x-filament-actions::modals />
</div>
