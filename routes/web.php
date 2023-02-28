<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Models\Post;

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

// Home
Route::get('/', function () {
    return view('home', ['posts' => Post::latest()->take(10)->get()]);
});

// About
Route::get('/about', function () {
    return view('about');
});

// Contact
Route::get('/contact', function () {
    return view('contact');
});

// Users
Route::controller(UserController::class)->group(function () {

    Route::get('login', 'login')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validateRegistration', 'validateRegistration')->name('validateRegistration');

    Route::post('validateLogin', 'validateLogin')->name('validateLogin');
});

// Blogs
Route::resource('posts', PostController::class);

// Comments
Route::post('posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

// Contact
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
