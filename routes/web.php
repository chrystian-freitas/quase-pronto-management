<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UserController;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\EditUser;
use App\Livewire\Users\ListUsers;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['isAdmin'])->group(function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('', ListUsers::class)->name('users');
            Route::get('/create', CreateUser::class)->name('users.create');
            Route::post('/', [UserController::class, 'store'])->name('users.store');
            Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
            Route::get('/{uuid}/edit', function () {
                return view('pages.edit-user');
            })->name('users.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        });
    });
});

require __DIR__.'/auth.php';
