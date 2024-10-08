<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class WidgetUserChart extends ChartWidget
{
    protected static ?string $heading = 'Users Chart';
    public ?string $filter = 'year';
    protected static ?int $sort = 4;

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
                    'label' => 'Total Users per Month',
                    'borderColor' => '#66bb6a',
                    'backgroundColor' => 'rgba(102, 187, 106, 0.2)',
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
        return Trend::model(User::class)
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
        return Trend::model(User::class)
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
        return Trend::model(User::class)
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
        return Trend::model(User::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
    }
}
