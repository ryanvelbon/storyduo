<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditProfile extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(auth()->user()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\FileUpload::make('avatar')
                                    ->image()
                                    ->panelLayout('circle')
                                    ->maxSize(1024),
                            ])
                            ->columnSpan(1),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextArea::make('bio')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('sm_twitter')
                                    ->label('twitter')
                                    ->prefix('https://twitter.com/'),
                                Forms\Components\TextInput::make('sm_linkedin')
                                    ->label('linkedin')
                                    ->prefix('https://www.linkedin.com/in/'),
                                Forms\Components\TextInput::make('sm_instagram')
                                    ->label('instagram')
                                    ->prefix('https://www.instagram.com/'),
                            ])
                            ->columns(2)
                            ->columnSpan(2),
                    ])
            ])
            ->statePath('data');
    }

    public function update(): void
    {
        $user = auth()->user();

        $user->update($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.edit-profile');
    }
}
