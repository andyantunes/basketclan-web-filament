<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Component;
use Rupadana\FilamentSwiper\Infolists\Components\SwiperImageEntry;

class LandingPage extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;


    public function landingPageInfolist(Infolist $infolist): Infolist
    {

        return $infolist
            ->state([
                'image' => [
                    'https://source.unsplash.com/random/200x200?sig=1',
                    'https://source.unsplash.com/random/200x200?sig=2',
                    'https://source.unsplash.com/random/200x200?sig=3',
                ]
            ])
            ->schema([
                SwiperImageEntry::make('image')
                    ->height("400px")
                    ->pagination()
                    ->navigation()
            ]);
    }

    public function render()
    {
        return view('livewire.landing-page')->layout('layouts.public');
    }
}
