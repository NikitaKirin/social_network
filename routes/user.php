<?php
// User's routes
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;

Route::prefix('users')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/', [UserController::class, 'update'])->name('users.update');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
});
