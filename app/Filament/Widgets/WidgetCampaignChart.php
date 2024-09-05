<?php

namespace App\Filament\Widgets;

use App\Models\Campaign;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class WidgetCampaignChart extends ChartWidget
{
    protected static ?string $heading = 'Campaigns Chart';

    protected function getData(): array
    {
        $data = Trend::model(Campaign::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Campaigns per Month',
                    'borderColor' => '#ffca28',
                    'backgroundColor' => 'rgba(255, 202, 40, 0.2)',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
