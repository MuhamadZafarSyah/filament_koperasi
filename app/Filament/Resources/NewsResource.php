<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\News;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NewsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NewsResource\RelationManagers;
use Filament\Forms\Components\Concerns\HasUploadingMessage;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-m-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live()
                    ->label('Judul'),
                Textarea::make('content')
                    ->live()
                    ->label('Isi Berita'),
                FileUpload::make('image')
                    ->image()
                    ->directory('news')
                    ->imageEditor(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    ImageColumn::make('image')
                        ->extraImgAttributes(['loading' => 'lazy'])
                        ->size(200),
                    TextColumn::make('title')
                        ->searchable()
                        ->sortable()
                        ->weight(FontWeight::Bold)
                        ->size('lg'),
                    TextColumn::make('content')->searchable(),
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
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
            'index' => Pages\ListNews::route('/'),
            // 'create' => Pages\CreateNews::route('/create'),
            // 'view' => Pages\ViewNews::route('/{record}'),
            // 'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
