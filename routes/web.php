<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath',]
    ],
    function () {
        Route::group([ 'namespace' => 'Laravel\Fortify\Http\Controllers', ], function () { require(base_path('vendor/laravel/fortify/routes/routes.php')); });

        Route::get('/', [SiteController::class, 'welcome'])->name('welcome');
        Route::get('about', [SiteController::class, 'about'])->name('about');
        Route::get('privacy', [SiteController::class, 'privacy'])->name('privacy');
        Route::post('contact-us', [SiteController::class, 'contactStore'])->name('contactStore');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('chat', [SiteController::class, 'chat'])->name('chat')->middleware('verifyFriendsCount');
            Route::get('results', [UserController::class, 'filter'])->name('results');
            Route::get('requests', [UserController::class, 'requests'])->name('requests');
            Route::get('settings', [ProfileController::class, 'edit'])->name('settings');
            Route::get('{user}', [ProfileController::class, 'index'])->name('profile');
            Route::get('{user}/friends', [ProfileController::class, 'friends'])->name('friends');
            Route::get('{user}/remove', [ProfileController::class, 'remove'])->name('profile.remove');
            Route::get('{user}/block', [ProfileController::class, 'block'])->name('profile.block');
            Route::get('{user}/unblock', [ProfileController::class, 'unblock'])->name('profile.unblock');
            Route::get('{user}/report', [ProfileController::class, 'report'])->name('profile.report');
            Route::post('{user}/report', [ProfileController::class, 'reportStore'])->name('profile.reportStore');
            Route::get('{user}/friend-request', [ProfileController::class, 'friendRequest'])->name('friendRequest');
            Route::get('{user}/message-request-refused', [ProfileController::class, 'messageRequestRefused'])->name('profiles.messageRequestRefused');
        });

    }
);
