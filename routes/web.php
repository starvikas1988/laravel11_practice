<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/users/{user}/posts', [UserController::class, 'posts'])->name('users.posts');
    Route::get('/posts/featured', [PostController::class, 'featuredPosts'])->name('posts.featured');
    Route::resource('posts', PostController::class);

    Route::resource('users', UserController::class);

    Route::resource('category',CategoryController::class)->middleware('checkRole');

    //Route::get('/comments/create/{post}/{user}', [CommentController::class, 'create'])->name('comment.create');

    Route::resource('comment',CommentController::class);

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});




require __DIR__.'/auth.php';
