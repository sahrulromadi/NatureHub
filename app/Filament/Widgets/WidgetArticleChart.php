<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Article;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class WidgetArticleChart extends ChartWidget
{
    protected static ?string $heading = 'Articles Chart';
    public ?string $filter = 'year';

    public static function canView(): bool
    {
        return User::find(Auth::id())->hasAnyRole(['Super Admin', 'Admin']);
    }

    protected function getData(): array
    {
        $data = match ($this->filter) {
            'today' => $this->getDailyData(),
            'week' => $this->getWeeklyData(),
            'month' => $this->getMonthlyData(),
            'year' => $this->getYearlyData(),
        };

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

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last Week',
            'month' => 'Last Month',
            'year' => 'This Year',
        ];
    }

    // Daily
    protected function getDailyData()
    {
        return Trend::query(Article::where('status', 'Published'))
            ->between(
                start: now()->startOfDay(),
                end: now()->endOfDay(),
            )
            ->perHour()
            ->count();
    }

    // Weekly
    protected function getWeeklyData()
    {
        return Trend::query(Article::where('status', 'Published'))
            ->between(
                start: now()->startOfWeek(),
                end: now()->endOfWeek(),
            )
            ->perDay()
            ->count();
    }

    // Monthly
    protected function getMonthlyData()
    {
        return Trend::query(Article::where('status', 'Published'))
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
    }

    // Yearly
    protected function getYearlyData()
    {
        return Trend::query(Article::where('status', 'Published'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
    }
}
