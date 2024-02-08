<?php

namespace App\Livewire\Widgets;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Widgets\Widget;
use Filament\Infolists\Infolist;
use Rupadana\FilamentSwiper\Infolists\Components\SwiperImageEntry;
use Rupadana\FilamentSwiper\Widgets\Components\Swiper;
use Rupadana\FilamentSwiper\Widgets\SwiperWidget;

class UsersSwiper extends SwiperWidget implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    protected static string $view = 'livewire.widgets.users-swiper';

    public function usersInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->state([
                'custom_images' => [
                    'https://source.unsplash.com/random/200x200?sig=1',
                    'https://source.unsplash.com/random/200x200?sig=2',
                    'https://source.unsplash.com/random/200x200?sig=3',
                ]
            ])
            ->schema([
                SwiperImageEntry::make('custom_images')
                    ->columnSpanFull()
                    ->height('400px')
                    ->pagination()
                    ->paginationClickable()
            ]);
    }
}
