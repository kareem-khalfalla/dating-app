<?php

use App\Http\Controllers\FriendshipController;
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
        Route::get('chat', [SiteController::class, 'chat'])->name('chat');
        Route::get('friends', [FriendshipController::class, 'index'])->name('friends');
        Route::get('results', [UserController::class, 'filter'])->name('users.filter');
        Route::get('requests', [UserController::class, 'requests'])->name('requests');
        Route::get('settings', [ProfileController::class, 'edit'])->name('settings');
        Route::get('{user}', [ProfileController::class, 'index'])->name('profile');
        Route::get('{user}/friend-request', [ProfileController::class, 'friendRequest'])->name('friendRequest');
        Route::get('{user}/message-request', [ProfileController::class, 'messageRequest'])->name('messageRequest');
        Route::get('{user}/message-request-refused', [ProfileController::class, 'messageRequestRefused'])->name('profiles.messageRequestRefused');
    }
);
