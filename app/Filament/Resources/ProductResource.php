<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\CheckboxColumn;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Forms\Components\TagsInput;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-c-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                TextInput::make('stock')
                    ->numeric(),



                Forms\Components\Select::make('category')
                    ->options([
                        'Seragam' => 'Seragam',
                        'Alat Tulis' => 'Alat Tulis',
                        'Jajanan' => 'Jajanan',
                        'Lainnnya' => 'Lainnnya',
                    ]),

                Select::make('size')
                    ->multiple()
                    ->options([
                        'S' => 'S',
                        'M' => 'M',
                        'L' => 'L',
                        'XL' => 'XL',
                        'XXL' => 'XXL',
                    ]),

                TagsInput::make('type')
                    ->label('Variant')
                    ->placeholder('Tambahkan Variant'),



                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->prefix('IDR')
                    ->maxValue(42949672.95),
                Forms\Components\TextInput::make('discount')
                    ->numeric()
                    ->prefix('IDR')
                    ->maxValue(42949672.95),

                FileUpload::make('image')
                    ->disk('public')
                    ->image()
                    ->nullable()
                    // ->captureMethod(['camera'])
                    ->directory('products')
                    ->imageEditor(),

                RichEditor::make('description')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ])->columnSpan(['md' => 1, 'xl' => 2]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    ImageColumn::make('image')
                        ->size(200),
                    TextColumn::make('name')
                        ->searchable()
                        ->sortable()
                        ->description('Nama Product', position: 'above'),
                    TextColumn::make('stock')
                        ->description('Stock', position: 'above')
                        ->size('lg'),
                    TextColumn::make('price')
                        ->description('Harga', position: 'above')
                        ->money('idr'),
                ]),
            ])
            ->contentGrid([
                'md' => 3,
                'xl' => 3,
                'sm' => 2
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            // 'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    // public static function getWidgets(): array
    // {
    //     return [
    //         ProductResource\Widgets\ProductChart::class,
    //     ];
    // }
    // public static function getHeaderWidgets(): array
    // {
    //     return [
    //         ProductResource\Widgets\ProductChart::class,
    //     ];
    // }
}
