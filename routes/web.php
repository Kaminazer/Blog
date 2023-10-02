<?php

use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\CreateController as CategoryCreateController;
use App\Http\Controllers\Admin\Category\StoreController as CategoryStoreController;
use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Main\IndexController;
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
Route::get('/', IndexController::class)->name('posts.index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', AdminIndexController::class)->name('admin.index');
});
Route::group(['prefix' => 'category'], function () {
    Route::get('/', CategoryIndexController::class)->name('category.index');
    Route::get('create', CategoryCreateController::class)->name('category.create');
    Route::post('store', CategoryStoreController::class)->name('category.store');
});
Auth::routes();
