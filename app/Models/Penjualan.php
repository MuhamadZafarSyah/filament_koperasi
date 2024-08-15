<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'penjualan' => 'array',
    // ];

    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected static function boot()
    {
        parent::boot();


        static::updating(function ($model) {
            // Set updated_at to the current timestamp
            $model->updated_at = Carbon::now();
        });

        static::saving(function ($model) {
            $product = Product::find($model->product_id);

            if ($product) {
                $model->pendapatan = $product->price * $model->penjualan;
            }

            $existingPenjualan = static::where('product_id', $model->product_id)->first();

            if ($existingPenjualan && $existingPenjualan->id !== $model->id) {
                throw new \Exception('Penjualan dengan product_id ini sudah ada.');
            }
        });
    }
}
