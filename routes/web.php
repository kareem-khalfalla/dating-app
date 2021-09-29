<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\Users\ListReports;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Users\UpdateOrCreateUser;
use App\Http\Livewire\ChatComponent;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath',]
    ],
    function () {
        Route::group(['namespace' => 'Laravel\Fortify\Http\Controllers',], function () {
            require(base_path('vendor/laravel/fortify/routes/routes.php'));
        });

        Route::get('/', [SiteController::class, 'welcome'])->name('welcome');
        Route::get('about', [SiteController::class, 'about'])->name('about');
        Route::get('privacy', [SiteController::class, 'privacy'])->name('privacy');
        Route::get('not-found', [SiteController::class, 'notFound'])->name('notFound');
        Route::post('contact-us', [SiteController::class, 'contactStore'])->name('contactStore');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('chat', [SiteController::class, 'chat'])->name('chat')->middleware('verifyFriendsCount');
            Route::get('friends', [SiteController::class, 'friends'])->name('friends');
            Route::get('results', [UserController::class, 'results'])->name('results');
            Route::get('requests', [UserController::class, 'requests'])->name('requests');
            Route::get('settings', [ProfileController::class, 'edit'])->name('settings');
            Route::get('{user}', [ProfileController::class, 'index'])->name('profile');

            Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
                Route::get('dashboard', DashboardController::class)->name('dashboard');
                Route::get('users', ListUsers::class)->name('users');
                Route::get('reports', ListReports::class)->name('reports');
                Route::get('users/create', UpdateOrCreateUser::class)->name('users.create');
                Route::get('users/{user?}', UpdateOrCreateUser::class)->name('users.update');
                Route::get('users/{user}/chat', ChatComponent::class)->name('user.chat');
            });
        });
    }
);
