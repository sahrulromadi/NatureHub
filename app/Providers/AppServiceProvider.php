<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Article;
use App\Models\Campaign;
use App\Observers\UserOberserver;
use App\Observers\ArticleObserver;
use App\Observers\CampaignObserver;
use Illuminate\Support\Facades\Gate;
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
        User::observe(UserOberserver::class);

        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });
    }
}
