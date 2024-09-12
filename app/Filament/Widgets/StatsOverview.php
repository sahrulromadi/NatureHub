<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Article;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $user = User::find(Auth::id());

        $totalArticles = Article::count();
        $reviewingArticles = Article::where('user_id', $user->id)->where('status', 'Reviewing')->count();
        $publishedArticles = Article::where('user_id', $user->id)->where('status', 'Published')->count();
        $rejectedArticles = Article::where('user_id', $user->id)->where('status', 'Rejected')->count();

        $totalCampaigns = Campaign::count();

        $totalUsers = User::count();
        $totalAuthors = User::whereHas('articles')->count();

        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return [
                Stat::make('Total Articles', $totalArticles)
                    ->url(route('filament.dashboard.resources.articles.index')),
                Stat::make('Total Campaigns', $totalCampaigns)
                    ->url(route('filament.dashboard.resources.campaigns.index')),
                Stat::make('Total Users', $totalUsers)
                    ->url(route('filament.dashboard.resources.users.index'))
            ];
        } else if ($user->hasRole('Writer')) {
            return [
                Stat::make('Reviewing Articles', $reviewingArticles)
                    ->url(route('filament.dashboard.resources.articles.index')),
                Stat::make('Published Articles', $publishedArticles)
                    ->url(route('filament.dashboard.resources.articles.index')),
                Stat::make('Rejected Articles', $rejectedArticles)
                    ->url(route('filament.dashboard.resources.articles.index'))
            ];
        } else if ($user->hasRole('Editor')) {
            $reviewingEditor = Article::where('status', 'Reviewing')->count();
            return [
                Stat::make('Reviewing Articles', $reviewingEditor)
                    ->url(route('filament.dashboard.resources.articles.index')),
                Stat::make('Total Articles', $totalArticles)
                    ->url(route('filament.dashboard.resources.articles.index')),
                Stat::make('Total Authors', $totalAuthors)
                    ->url(route('filament.dashboard.resources.articles.index'))
            ];
        } else {
            return [];
        }
    }
}
