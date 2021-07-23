<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

// Article's routes
Route::get('/articles/create', [ArticleController::class, 'index'])->name('create-article')->middleware('auth');
Route::post('/articles/create', [ArticleController::class, 'create'])->name('create-article');
Route::get('/articles/all', [ArticleController::class, 'allArticles'])->name('all-articles');
Route::get('/articles/{id}', [ArticleController::class, 'article'])->name('article');
Route::get('/articles/{article}/edit', [ArticleController::class, 'showEditForm'])->name('article-edit-form');
Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('article-update');
Route::get('/user/{id}/articles/', [ArticleController::class, 'showUserArticles'])->name('user-articles');

// User's routes
Route::get('/user/edit', [UserController::class, 'showEditForm'])->name('user-edit-form');
Route::post('/user/edit', [UserController::class, 'update'])->name('user-update');
Route::get('/user/{id}', [UserController::class, 'showUserPage'])->name('user-page');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->name('register');
