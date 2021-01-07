<?php

namespace App\Providers;

use App\Http\Views\Composers\Feed;
use App\Http\Views\Composers\UserNotifications;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
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
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('profile.components.notifications', UserNotifications::class);
        View::composer('post.components.feed', Feed::class);
    }
}
