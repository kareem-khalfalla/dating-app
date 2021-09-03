<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('search', function () {
//     return view('search');
// })->name('search');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('settings', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('{user}', [ProfileController::class, 'index'])->name('profile');
        Route::get('{user}/message-request', [ProfileController::class, 'messageRequest'])->name('messageRequest');
        // Route::get('results', [UserController::class, 'filter'])->name('users.filter');
        // Route::get('{user}/notifications', [UserController::class, 'notifications'])->name('users.notifications');
        // Route::get('{user}/message-request-refused', [ProfileController::class, 'messageRequestRefused'])->name('profiles.messageRequestRefused');
    }
);
