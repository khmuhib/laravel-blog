<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

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


    Route::get('/post',  [PostController::class, 'index'])->name('admin.post.list');
    Route::get('/post/create',  [PostController::class, 'create'])->name('admin.post.create');
    Route::post('/post/store',  [PostController::class, 'store'])->name('admin.post.store');
    Route::get('/post/edit/{id}',  [PostController::class, 'edit'])->name('admin.post.edit');
    Route::put('/post/update/{id}',  [PostController::class, 'update'])->name('admin.post.update');
    Route::get('/post/delete/{id}',  [PostController::class, 'delete'])->name('admin.post.delete');

    Route::get('/user',  [UserController::class, 'index'])->name('admin.user.list');
    Route::get('/user/edit/{id}',  [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/update/{id}',  [UserController::class, 'update'])->name('admin.user.update');


});


