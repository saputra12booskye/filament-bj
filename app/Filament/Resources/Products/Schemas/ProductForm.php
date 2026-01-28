<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('description'),
                TextInput::make('price')->required()->numeric(),
                TextInput::make('stock_quantity')->required()->numeric(),
                FileUpload::make('foto')
                ->image()
                ->maxSize(1024)
                ->directory('product-photos')
                ->nullable(),
            ]);
    }
}
