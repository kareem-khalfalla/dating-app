<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/', [SiteController::class, 'welcome'])->name('welcome');
Route::get('about', [SiteController::class, 'about'])->name('about');
Route::get('privacy', [SiteController::class, 'privacy'])->name('privacy');
Route::post('contact-us', [SiteController::class, 'contactStore'])->name('contactStore');
Route::get('not-allowed', [SiteController::class, 'notAllowed'])->name('notAllowed');

Route::group(['middleware' => ['auth']], function () {
    Route::get('chat', [SiteController::class, 'chat'])->name('chat')->middleware('verifyFriendsCount');
    Route::get('friends', [SiteController::class, 'friends'])->name('friends');
    Route::get('results', [UserController::class, 'results'])->name('results');
    Route::get('requests', [UserController::class, 'requests'])->name('requests');
    Route::get('settings', [ProfileController::class, 'edit'])->name('settings');
    Route::get('{user}', [ProfileController::class, 'index'])->name('profile');
});
