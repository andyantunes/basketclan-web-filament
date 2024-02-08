<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class LandingPage extends Component implements HasForms
{
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.landing-page')->layout('layouts.public');
    }
}
