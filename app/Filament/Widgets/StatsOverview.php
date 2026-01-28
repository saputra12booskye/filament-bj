<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Jumlah seluruh produk')
                ->icon('heroicon-o-cube')
                ->color('primary'),

            Stat::make('Total Stok', Product::sum('stock_quantity'))
                ->description('Total stok tersedia')
                ->icon('heroicon-o-archive-box')
                ->color('success'),

            Stat::make(
                'Produk dengan Foto',
                Product::whereNotNull('foto')->count()
            )
                ->description('Sudah upload foto')
                ->icon('heroicon-o-photo')
                ->color('warning'),
        ];
    }
}
