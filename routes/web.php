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

Route::get('/', IndexController::class)->name('posts.index');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
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
        Route::get('{tag}', 'ShowController')->name('show');
        Route::get('{tag}/edit', 'EditController')->name('edit');
        Route::patch('{tag}', 'UpdateController')->name('update');
        Route::delete('{tag}', 'DestroyController')->name('destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
