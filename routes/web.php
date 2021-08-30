<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', function () {
            return view('auth.register', [
                // 'user' => Auth::user() ?? User::all()->random(),
            ]);
        });

        Route::get('results', [UserController::class, 'filter'])->name('users.filter');
        Route::get('{user}', [ProfileController::class, 'show'])->name('users.profile');
        Route::get('{user}/message-request', [ProfileController::class, 'messageRequest'])->name('profiles.messageRequest');
        Route::get('{user}/notifications', [UserController::class, 'notifications'])->name('users.notifications');
        Route::get('{user}/message-request-refused', [ProfileController::class, 'messageRequestRefused'])->name('profiles.messageRequestRefused');
    }
);

Route::get('cities', [CityController::class, 'index'])->name('cities.index');
Route::get('states', [CityController::class, 'index'])->name('states.index');