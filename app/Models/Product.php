<?php

namespace App\Models;

use Stevebauman\Purify\Facades\Purify;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'size' => 'array',
        'type' => 'array',
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function getPriceAsNumberAttribute()
    {
        return intval(str_replace('.', '', $this->price));
    }

    public function getDiscountAsNumberAttribute()
    {
        return intval(str_replace('.', '', $this->discount));
    }

    // Accessor untuk mendapatkan total harga setelah diskon
    public function getTotalPriceAttribute()
    {
        return $this->price_as_number - $this->discount_as_number;
    }


    public function penjualan(): HasOne
    {
        return $this->hasOne(Penjualan::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    protected static function boot()
    {
        parent::boot();


        static::deleting(function ($product) {
            // Pastikan kolom 'image' adalah kolom yang menyimpan path gambar pada model Product
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        });

        /** @var Model $model */
        static::updating(function ($model) {
            if ($model->isDirty('image') && ($model->getOriginal('image') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('image'));
            }
        });
    }

    public static function getCleanOptionString(Model $model): string
    {
        return Purify::clean(
            view('filament.components.select-product-result')
                ->with('name', $model?->name)
                ->with('category', $model?->category)
                ->with('image', $model?->image)
                ->render()
        );
    }
}
