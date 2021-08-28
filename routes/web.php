<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/register', function () {
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