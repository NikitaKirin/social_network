<?php
// User's routes
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CommentController;

Route::prefix('users')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/', [UserController::class, 'update'])->name('users.update');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/{user_id}/store', [CommentController::class, 'store',])->name('users.comment.store');
    Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('users.comment.edit')->middleware('can:update,comment');
    Route::patch('/{comment}/edit', [CommentController::class, 'update'])->name('users.comment.update')->middleware('can:update,comment');
});
