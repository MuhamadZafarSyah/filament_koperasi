<?php

namespace App\Filament\Resources\PenjualanResource\Pages;

use Filament\Actions;
use Illuminate\Support\Carbon;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PenjualanResource;

class EditPenjualan extends EditRecord
{
    protected static string $resource = PenjualanResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_at'] = Carbon::now();

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
