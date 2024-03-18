<?php

namespace App\Filament\Resources\StoryResource\Pages;

use App\Filament\Resources\StoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStory extends CreateRecord
{
    protected static string $resource = StoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!isset($data['author_id'])) {
            $data['author_id'] = auth()->id();
        }

        return $data;
    }
}
