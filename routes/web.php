<?php

use App\Http\Controllers\{FriendshipController, ProfileController};
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::get('/{user:id}', [ProfileController::class, 'show'])->name('show');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
    });

    Route::prefix('friendship')->name('friendship.')->group(function () {
        Route::post(
            '/{sender:id}/{receiver}/send',
            [FriendshipController::class, 'sendFriendRequest']
        )->name('send');
        Route::post(
            '/{sender:id}/{receiver}/approve',
            [FriendshipController::class, 'approveFriendRequest']
        )->name('approve');
        Route::post(
            '/{sender:id}/{receiver}/reject',
            [FriendshipController::class, 'rejectFriendRequest']
        )->name('reject');
        Route::post(
            '/{receiver:id}/unfriend',
            [FriendshipController::class, 'unfriend']
        )->name('unfriend');
    });
});

