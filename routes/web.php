<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('index', [PostController::class, 'index'])->name('posts.index');
        Route::get('create', [PostController::class, 'create'])->name('posts.create');
        Route::post('store', [PostController::class, 'store'])->name('posts.store');
        Route::get('{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('{id}/update', [PostController::class, 'update'])->name('posts.update');
        Route::delete('{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
    });
    Route::prefix('users')->middleware(['auth', 'admin'])->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('{id}/update', [UserController::class, 'update'])->name('users.update');
        Route::delete('{id}/delete/', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__ . '/auth.php';
