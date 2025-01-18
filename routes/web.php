<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;




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


//Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/posts', [UserController::class, 'posts'])->name('users.posts');
Route::get('/posts/featured', [PostController::class, 'featuredPosts'])->name('posts.featured');
Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::resource('category',CategoryController::class)->middleware('checkRole');

//Route::get('/comments/create/{post}/{user}', [CommentController::class, 'create'])->name('comment.create');

Route::resource('comment',CommentController::class);

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::get('user/dashboard', function() {
    dd('User Dashboard');
})->middleware('checkRole:user');

Route::get('admin/dashboard', function() {
    dd('Admin Dashboard');
})->middleware('checkRole:admin');








// Display all posts with users and comments
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// // Show the create post form
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// // Show a single post with its comments
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// // Show the edit post form
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// // Update a post
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// // Delete a post
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/', function () {
    return redirect('users');
});
