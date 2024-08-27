<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Campaign;
use App\Observers\ArticleObserver;
use App\Observers\CampaignObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Article::observe(ArticleObserver::class);
        Campaign::observe(CampaignObserver::class);
    }
}
