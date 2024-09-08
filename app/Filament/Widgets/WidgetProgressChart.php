<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Article;
use App\Models\Campaign;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class WidgetProgressChart extends ChartWidget
{
    protected static ?string $heading = 'Progress Chart';
    public ?string $filter = 'year';
    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return User::find(Auth::id())->hasAnyRole(['Super Admin', 'Admin']);
    }

    protected function getData(): array
    {
        $dataRange = $this->getDataRange();

        $articles = Trend::query(Article::where('status', 'Published'))
            ->between(
                start: $dataRange['start'],
                end: $dataRange['end'],
            )
            ->perMonth()
            ->count();

        $campaigns = Trend::query(Campaign::query())
            ->between(
                start: $dataRange['start'],
                end: $dataRange['end'],
            )
            ->perMonth()
            ->count();

        $users = Trend::query(User::query())
            ->between(
                start: $dataRange['start'],
                end: $dataRange['end'],
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
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
                ],
            ],
            'labels' => $articles->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last Week',
            'month' => 'This Month',
            'year' => 'This Year',
        ];
    }

    protected function getDataRange(): array
    {
        return match ($this->filter) {
            'daily' => [
                'start' => now()->startOfDay(),
                'end' => now()->endOfDay(),
            ],
            'week' => [
                'start' => now()->startOfWeek(),
                'end' => now()->endOfWeek(),
            ],
            'month' => [
                'start' => now()->startOfMonth(),
                'end' => now()->endOfMonth(),
            ],
            'year' => [
                'start' => now()->startOfYear(),
                'end' => now()->endOfYear(),
            ],
        };
    }
}
