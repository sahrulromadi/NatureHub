<?php

namespace App\Filament\Widgets;

use App\Models\Campaign;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class WidgetCampaignChart extends ChartWidget
{
    protected static ?string $heading = 'Campaigns Chart';
    public ?string $filter = 'year';

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
        return Trend::model(Campaign::class)
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
        return Trend::model(Campaign::class)
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
        return Trend::model(Campaign::class)
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
        return Trend::model(Campaign::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
    }
}
