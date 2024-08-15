<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class WidgetProductChart extends ChartWidget
{
    protected static ?string $heading = 'Penjualan';

    protected int|string|array $columnSpan = 'full';

    public function getColumns(): int|string|array
    {
        return 2;
    }

    protected function getData(): array
    {
        // Mengambil data penjualan per hari
        $data = DB::table('penjualans')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(penjualan) as total_penjualan'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Mengatur data untuk dataset
        $dates = $data->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d M'); // Format tanggal sesuai kebutuhan
        })->toArray();

        $totalPenjualan = $data->pluck('total_penjualan')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan',
                    'data' => $totalPenjualan,
                ],
            ],
            'labels' => $dates,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
