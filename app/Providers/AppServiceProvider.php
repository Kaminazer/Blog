<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.admin', function ($view) {
            $view->with([
                'categoriesCount' => Category::count(),
                'tagsCount' => Tag::count(),
                'postsCount' => Post::count(),
                'usersCount' => User::count(),
                'newsCount' => News::where('status_display',1)->count(),
                ]);
        });
        View::composer('layouts.profile', function ($view) {
            $view->with([
                'likedPostsCount' => auth()->user()->likedPosts()->count(),
                'commentsCount' => auth()->user()->comments()->count()
            ]);
        });
        Paginator::useBootstrap();
    }
}
