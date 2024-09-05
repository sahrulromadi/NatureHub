<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class WidgetArticleChart extends ChartWidget
{
    protected static ?string $heading = 'Articles Chart';

    protected function getData(): array
    {
        $data = Trend::query(Article::where('status', 'Published'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Articles Published per Month',
                    'borderColor' => '#42a5f5',
                    'backgroundColor' => 'rgba(66, 165, 245, 0.2)',
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
