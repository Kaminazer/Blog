<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Admin\News\IndexController::class)->name('main.index');

Route::group(['prefix' => 'posts', 'namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('{post}', 'ShowController')->name('post.show');
});

Route::group(['prefix' => 'profile', 'namespace' => 'App\Http\Controllers\Profile', 'middleware' => ['auth', /*'verified'*/], 'as' => 'profile.'], function () {
    Route::get('/', 'Main\IndexController')->name('index');

    Route::group(['prefix' => 'liked', 'namespace' => 'Liked', 'as' => 'liked.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::post('{post}', 'StoreController')->name('store');
        Route::delete('{post}', 'DestroyController')->name('destroy');
    });

    Route::group(['prefix' => 'comments', 'namespace' => 'Comment', 'as' => 'comment.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::post('store', 'StoreController')->name('store');
        Route::get('{comment}', 'EditController')->name('edit');
        Route::patch('{comment}', 'UpdateController')->name('update');
        Route::delete('{comment}', 'DestroyController')->name('destroy');
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', /*'verified',*/'admin'], 'as' => 'admin.'], function () {
    Route::get('/', 'Main\IndexController')->name('index');

    Route::group(['prefix' => 'category', 'namespace' => 'Category', 'as' => 'category.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('store', 'StoreController')->name('store');
        Route::get('{category}', 'ShowController')->name('show');
        Route::get('{category}/edit', 'EditController')->name('edit');
        Route::patch('{category}', 'UpdateController')->name('update');
        Route::delete('{category}', 'DestroyController')->name('destroy');
    });
    Route::group(['prefix' => 'tag', 'namespace' => 'Tag', 'as' => 'tag.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('store', 'StoreController')->name('store');
        Route::get('{tag}', 'ShowController')->name('show');
        Route::get('{tag}/edit', 'EditController')->name('edit');
        Route::patch('{tag}', 'UpdateController')->name('update');
        Route::delete('{tag}', 'DestroyController')->name('destroy');
     });

    Route::group(['prefix' => 'post', 'namespace' => 'Post', 'as' => 'post.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('store', 'StoreController')->name('store');
        Route::get('{post}', 'ShowController')->name('show');
        Route::get('{post}/edit', 'EditController')->name('edit');
        Route::patch('{post}', 'UpdateController')->name('update');
        Route::delete('{post}', 'DestroyController')->name('destroy');
    });

    Route::group(['prefix' => 'new', 'namespace' => 'News', 'as' => 'new.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('store', 'StoreController')->name('store');
        Route::get('{new}', 'ShowController')->name('show');
        Route::get('{new}/edit', 'EditController')->name('edit');
        Route::patch('{new}', 'UpdateController')->name('update');
        Route::delete('{new}', 'DestroyController')->name('destroy');
    });

    Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('store', 'StoreController')->name('store');
        Route::get('{user}', 'ShowController')->name('show');
        Route::get('{user}/edit', 'EditController')->name('edit');
        Route::patch('{user}', 'UpdateController')->name('update');
        Route::delete('{user}', 'DestroyController')->name('destroy');
    });
});

Route::group(['prefix' => 'categories', 'namespace' => 'App\Http\Controllers\Category'], function (){
    Route::get('/', 'IndexController')->name("categories.index");
    Route::get('{category}/posts', 'Post\IndexController')->name("categories.posts.index");
});
Auth::routes();


