<?php

namespace App\Filament\Resources\PenjualanResource\Pages;

use Filament\Actions;
use Illuminate\Support\Carbon;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PenjualanResource;

class CreatePenjualan extends CreateRecord
{
    protected static string $resource = PenjualanResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Membuat slug otomatis berdasarkan nama produk
        $data['updated_at'] = Carbon::now();

        return $data;
    }
}
