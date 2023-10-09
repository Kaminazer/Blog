<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', IndexController::class)->name('main.index');

Route::group(['prefix' => 'profile', 'namespace' => 'App\Http\Controllers\Profile', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'Main\IndexController')->name('profile.index');

    Route::group(['prefix' => 'liked', 'namespace' => 'Liked', 'as' => 'liked.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::delete('{post}', 'DestroyController')->name('destroy');
    });

    Route::group(['prefix' => 'comments', 'namespace' => 'Comment', 'as' => 'comment.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('{comment}', 'EditController')->name('edit');
        Route::patch('{comment}', 'UpdateController')->name('update');
        Route::delete('{comment}', 'DestroyController')->name('destroy');
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'verified','admin']], function () {
    Route::get('/', 'Main\IndexController')->name('admin.index');

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
