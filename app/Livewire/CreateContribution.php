<?php
 
namespace App\Livewire;
 
use App\Models\Contribution;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
 
class CreateContribution extends Component implements HasForms
{
    use InteractsWithForms;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->maxLength(80)
                    ->required(),
                RichEditor::make('content')
                    ->maxLength(20000)
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'redo',
                        'undo',
                    ]),
                // ...
            ])
            ->statePath('data');
    }
    
    public function create()
    {
        Contribution::create(
            array_merge($this->form->getState(), [
                'author_id' => auth()->id(),
                'status' => 'pending',
            ])
        );

        return redirect()->route('contributions.success');
    }
    
    public function render(): View
    {
        return view('livewire.create-contribution');
    }
}
