<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\Users\ListReports;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Users\UpdateOrCreateUser;
use App\Http\Livewire\ChatComponent;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('users', ListUsers::class)->name('users');
Route::get('reports', ListReports::class)->name('reports');
Route::get('users/create', UpdateOrCreateUser::class)->name('users.create');
Route::get('users/{user?}', UpdateOrCreateUser::class)->name('users.update');
Route::get('users/{user}/chat', ChatComponent::class)->name('user.chat');
