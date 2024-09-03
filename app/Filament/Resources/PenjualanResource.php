<?php

namespace App\Filament\Resources;

use Carbon\CarbonTimeZone;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use App\Models\Penjualan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PenjualanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenjualanResource\RelationManagers;
use Illuminate\Support\Carbon;
use LaraZeus\Quantity\Components\Quantity;

class PenjualanResource extends Resource
{
    protected static ?string $model  = Penjualan::class;

    // Properti untuk menyimpan cached products
    protected static ?Collection $cachedUsers = null;

    public function __construct()
    {
        static::$cachedUsers = new Collection();
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Select::make('product_id')
                    ->label('Product')
                    ->allowHtml()
                    ->getSearchResultsUsing(function (string $search) {
                        // Lakukan satu query dengan eager loading untuk menghindari N+1
                        $products = Product::where('name', 'like', "%{$search}%")->limit(50)->get();

                        // Simpan hasil query ke dalam cache
                        static::$cachedUsers = $products->keyBy('id');

                        return $products->mapWithKeys(function ($product) {
                            return [$product->getKey() => Product::getCleanOptionString($product)];
                        })->toArray();
                    })
                    // ->getOptionLabelUsing(function ($value): string {
                    //     // Cek apakah product sudah ada di cache
                    //     $product = static::$cachedUsers->get($value);

                    //     if (!$product) {
                    //         // Jika tidak ada, lakukan query sekali lagi (meskipun ini harusnya jarang terjadi)
                    //         $product = Product::find($value);
                    //     }

                    //     return Product::getCleanOptionString($product);
                    // })
                    ->searchable()
                    ->reactive()
                    ->required()
                    ->disabledOn('edit')
                    ->hiddenOn('edit')
                    ->afterStateUpdated(function (callable $set, $state) use ($form) {
                        $product = Product::find($state);

                        if ($product) {
                            $set('pendapatan', $product->price * ($form->getState()['penjualan'] ?? 0));
                        }
                    }),

                Quantity::make('penjualan')
                    ->label('Jumlah')
                    ->default(1)
                    ->maxValue(100)
                    ->minValue(1)

                    ->required()
                    ->afterStateUpdated(function (callable $set, $state) use ($form) {
                        $product = Product::find($form->getState()['product_id'] ?? null);

                        if ($product) {
                            $set('pendapatan', $product->price * $state);
                        }
                    }),

                TextInput::make('pendapatan')
                    ->label('Pendapatan')
                    ->disabled()
                    ->hidden()
                    ->default(0),

                TextInput::make('updated_at')
                    ->label('Last Updated')
                    ->hidden()
                    // ->disabled() // Optional: to prevent user editing
                    ->default(Carbon::now()->toDateTimeString()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    ImageColumn::make('product.image')
                        ->size(100)
                        ->alignCenter(),
                    // ->circular(),
                    TextColumn::make('product.name')
                        ->description('Nama Product', position: 'above')
                        ->searchable()
                        ->size('xl')
                        ->sortable(),
                    TextColumn::make('penjualan')
                        ->description('Terjual', position: 'above'),
                    TextColumn::make('pendapatan')
                        ->money('Rp ')
                        ->label('Pendapatan')
                        ->description('Pendapatan', position: 'above'),

                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
                'sm' => 2,
                'default' => 2,
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected static function beforeSave(Model $record)
    {
        // Mengambil data produk berdasarkan product_id
        $product = Product::find($record->product_id);

        if ($product) {
            // Menghitung pendapatan
            $pendapatan = $product->price * $record->penjualan;

            // Menetapkan nilai pendapatan pada record
            $record->pendapatan = $pendapatan;
        }
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenjualans::route('/'),
            // 'view' => Pages\ViewPenjualans::route('/{record}'),
            // 'create' => Pages\CreatePenjualan::route('/create'),
            // 'edit' => Pages\EditPenjualan::route('/{record}/edit'),
        ];
    }
}
