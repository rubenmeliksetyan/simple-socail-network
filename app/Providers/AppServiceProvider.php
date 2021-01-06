<?php

namespace App\Providers;

use App\Http\Views\Composers\UserNotifications;
use App\Services\FriendshipInterface;
use App\Services\FriendshipService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FriendshipInterface::class, FriendshipService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('profile.components.notifications', UserNotifications::class);
    }
}
