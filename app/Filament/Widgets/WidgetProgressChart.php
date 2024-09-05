<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Article;
use App\Models\Campaign;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class WidgetProgressChart extends ChartWidget
{
    protected static ?string $heading = 'Progress Chart';

    protected function getData(): array
    {
        $articles = Trend::query(Article::where('status', 'Published'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        $campaigns = Trend::model(Campaign::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        $users = Trend::model(User::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' =>
            [
                [
                    'label' => 'Articles',
                    'borderColor' => '#42a5f5',
                    'backgroundColor' => 'rgba(66, 165, 245, 0.2)',
                    'data' => $articles->map(fn(TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Campaigns',
                    'borderColor' => '#ffca28',
                    'backgroundColor' => 'rgba(255, 202, 40, 0.2)',
                    'data' => $campaigns->map(fn(TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Users',
                    'borderColor' => '#66bb6a',
                    'backgroundColor' => 'rgba(102, 187, 106, 0.2)',
                    'data' => $users->map(fn(TrendValue $value) => $value->aggregate),
                ]
            ],
            'labels' => $articles->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
