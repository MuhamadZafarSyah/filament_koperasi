<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductResource;
use Spatie\ImageOptimizer\OptimizerChainFactory;


class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Membuat slug otomatis berdasarkan nama produk
        $data['category_slug'] = Str::slug($data['category']);

        if (isset($data['image']) && is_object($data['image'])) {
            $path = $data['image']->create('products', 'public');

            // Optimize the image
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize(Storage::disk('public')->get($path));

            $data['image'] = $path;
        }

        return $data;
    }


}
