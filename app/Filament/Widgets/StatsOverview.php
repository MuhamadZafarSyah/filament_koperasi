<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $products = Product::count();
        $news = News::count();
        $users = User::count();

        return [
            Stat::make('Products', $products)
                ->description('Total Products')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('News', $news)
                ->description('Total News')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Users', $users)
                ->description('Total Users')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
