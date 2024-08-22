<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Checkout;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CheckoutResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CheckoutResource\RelationManagers;

class CheckoutResource extends Resource
{
    protected static ?string $model = Checkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pembeli'),
                TextInput::make('kelas_pembeli'),
                TextInput::make('kode_bukti'),
                TextInput::make('total_harga'),
                FileUpload::make('img_bukti_transfer')
            ]);
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img_bukti_transfer')
                    ->size(100),
                TextColumn::make('nama_pembeli')
                    ->searchable()
                    ->sortable()
                    ->description('Nama Pembeli', position: 'above'),
                TextColumn::make('kode_bukti')
                    ->description('Kode transaksi', position: 'above')
                    ->size('lg')
                    ->searchable(),
                TextColumn::make('total_harga')
                    ->description('Total pembayaran', position: 'above')
                    ->money('idr'),
                BadgeColumn::make('status')
                    ->colors([
                        'primary',
                        'warning' => static fn($state): bool => $state === 'Pending',
                        'success' => static fn($state): bool => $state === 'Success',
                        'danger' => static fn($state): bool => $state === 'Failed',
                    ]),
                TextColumn::make('created_at')
                    ->description('Tanggal pembayaran', position: 'above')
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-m-eye')
                    ->iconButton(),
                Action::make('approve')
                    ->requiresConfirmation()
                    ->modalIcon('heroicon-s-check')
                    ->icon('heroicon-s-check-badge')
                    ->Color('success')
                    ->iconButton()
                    ->action(function (Checkout $checkout) {
                        // dd($checkout);
                        $checkout->status = 'Success';
                        $checkout->save();
                        // Checkout::destroy($checkout);
                    }),
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
            'index' => Pages\ListCheckouts::route('/'),

        ];
    }
}
