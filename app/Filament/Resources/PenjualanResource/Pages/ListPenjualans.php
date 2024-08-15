<?php

namespace App\Filament\Resources\PenjualanResource\Pages;

use Filament\Actions\Button;
use Filament\Actions\CreateAction;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PenjualanResource;

class ListPenjualans extends ListRecords
{
    protected static string $resource = PenjualanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Button::make()
                ->url(fn () => route('download.laporan'))
                ->openUrlInNewTab(),
            Actions\CreateAction::make(),
            // Actions\Button::make('custom')
            //     ->label('Custom Button')
            //     ->onClick(function () {
            //         // Logic to execute when the custom button is clicked
            //     }),
            // Add more actions as needed
        ];
    }
}
    // protected function getActions(): array
    // {
    //     return [
    //         Action::make('settings')
    //             ->label('Settings')
    //             ->url(route('settings')),
    //     ];
    // }
