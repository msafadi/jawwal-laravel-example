<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

// Register new route "/" can be called by GET request only
Route::get('/', [PostsController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

// Regsiter 7 routes
// GET     http://localhost:8000/posts -> index@PostsController
// POST    http://localhost:8000/posts -> store@PostsController
// GET     http://localhost:8000/posts/create -> create@PostsController
// GET     http://localhost:8000/posts/{post} -> show@PostsController
// PUT     http://localhost:8000/posts/{post} -> update@PostsController
// DELETE  http://localhost:8000/posts/{post} -> destroy@PostsController
// GET     http://localhost:8000/posts/{post}/edit -> edit@PostsController
Route::resource('posts', PostsController::class)->middleware(['auth']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

