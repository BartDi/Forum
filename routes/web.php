<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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

Route::get('/', [PostsController::class, 'show']);
Route::get('/create', [PostsController::class, 'create'])->middleware('auth');
Route::post('/create', [PostsController::class, 'addToBase'])->middleware('auth');
Route::get('/users/{user_id}', [PostsController::class, 'userProfile']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addCat', [PostsController::class, 'categoriesForm'])->middleware('auth');
Route::post('/addCat', [PostsController::class, 'addCategory'])->middleware('auth');
Route::get('/like/{pId}', [PostsController::class, 'like'])->middleware('auth');
Route::get('/post/{id}', [PostsController::class, 'postSite']);
Route::get('/category/{name}', [PostsController::class, 'oneCategory']);