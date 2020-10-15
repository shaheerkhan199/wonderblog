<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Models\Author;
use App\Http\Controllers\PostController;
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

Route::get('authors', [AuthorController::class, 'allAuthors'])->name("authors");
Route::get('post', [PostController::class, 'viewPost'])->name("readPost");
Route::get("", [PostController::class, 'renderIndexPageWithLatestPost'])->name("home");
Route::get("login", [AuthorController::class, 'showLoginView'])->name("loginAndSignup");
Route::get("author", [AuthorController::class, 'authorAllPosts'])->name('authorAllPost');
Route::get("createPost", [PostController::class, 'showCreatePostView'])->name('createNewPost');
Route::get("profile", [AuthorController::class, 'showAuthorProfile'])->name('profile');
Route::get('logout', [AuthorController::class, 'logout'])->name('logout');
Route::get('clickedAuthor', [PostController::class, 'getClickedAuthorPosts'])->name('clickedAuthor');

Route::post('registerUser', [AuthorController::class, 'create'])->name('registerUser');
Route::post('authenticate', [AuthorController::class, 'authenticate'])->name('authenticate');
Route::post('storePost', [PostController::class, 'addPostInDB'])->name('addPostInDB');
Route::post('updateProfile',[AuthorController::class, 'updateAuthorProfile'])->name('updateAuthorProfile');
Route::get('deletePost/{post}', [PostController::class, 'deletePost'])->name('deletePost');
Route::get('editPost/{post}', [PostController::class, 'editPost'])->name('editPost');
Route::post('updatePost/{post}', [PostController::class, 'updatePost'])->name('updatePost');
Route::post('search', [PostController::class, 'getSearchResults'])->name('search');

