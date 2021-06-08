<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyController;


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

Route::get('/', [PostController::class, 'index'])
    ->name('index');

// TODO стоит ли делать группу для имени, uri? Middleware писать в контроллер или роутинг?
Route::name('posts.')->group(function () {
    Route::get('/posts/', [PostController::class, 'index'])->name('index');
    Route::post('/posts', [PostController::class, 'store'])->name('store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');
});


Route::name('user.')->group(function () {
    Route::get('/user/{user}', [UserController::class, 'show'])->name('show');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::patch('/user/{user}', [UserController::class, 'update'])->name('update');
});


Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/email/verify', [VerifyController::class, 'show'])->name('verification.show');
Route::post('/email/verification-notification', [VerifyController::class, 'send'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [VerifyController::class, 'verify'])->name('verification.verify');
