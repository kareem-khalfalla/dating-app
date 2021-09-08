<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', [SiteController::class, 'welcome'])->name('welcome');
Route::get('about', [SiteController::class, 'about'])->name('about');
Route::get('privacy', [SiteController::class, 'privacy'])->name('privacy');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',]
    ],
    function () {
        Route::get('friends', [FriendController::class, 'index'])->name('friends.index');
        Route::get('results', [UserController::class, 'filter'])->name('users.filter');
        Route::get('settings', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('requests', [UserController::class, 'requests'])->name('users.requests');
        Route::get('{user}', [ProfileController::class, 'index'])->name('profile');
        Route::get('{user}/message-request', [ProfileController::class, 'messageRequest'])->name('messageRequest');
        Route::get('{user}/message-request-refused', [ProfileController::class, 'messageRequestRefused'])->name('profiles.messageRequestRefused');
    }
);
