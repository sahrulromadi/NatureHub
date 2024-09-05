<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Article;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsSuperAdmin extends BaseWidget
{
    protected function getStats(): array
    {
        $user = User::find(Auth::id());

        $stats = [];
        $totalArticles = Article::where('status', 'Published')->count();
        $totalCampaigns = Campaign::count();
        $totalUsers = User::count();

        // Super Admin
        if ($user->hasRole('Super Admin')) {
            $stats = [
                Stat::make('Total Articles', $totalArticles)
                    ->url(route('filament.dashboard.resources.articles.index')),
                Stat::make('Total Campaigns', $totalCampaigns)
                    ->url(route('filament.dashboard.resources.users.index')),
                Stat::make('Total Users', $totalUsers)
                    ->url(route('filament.dashboard.resources.campaigns.index')),
            ];
        }
        return $stats;
    }
}
