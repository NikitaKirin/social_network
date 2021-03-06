<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Article\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Article's routes
Route::prefix('articles')->group(function () {

    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('can:update,article');
    Route::patch('/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('can:update,article');
    Route::get('/user/{user}', [ArticleController::class, 'indexUserArticles'])->name('user.articles.index');

});

// Article's comments routes
Route::post('articles/{article}/comments', [CommentController::class, 'store'])->name('articles.comments.store');

// Register's routes
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->name('register');
