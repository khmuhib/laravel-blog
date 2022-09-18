<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear-all', function () {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    dd('Cached Cleared');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/category',  [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create',  [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store',  [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}',  [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}',  [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}',  [CategoryController::class, 'delete'])->name('category.delete');


    Route::get('/post',  [PostController::class, 'index'])->name('admin.post');
    Route::get('/post/create',  [PostController::class, 'create'])->name('admin.create');


});


