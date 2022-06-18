<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\CommentController;
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
    return view('welcome');
});

// Route::get('/articles', function(){
//     return "Article Home";
// });

// Route::get('/articles/detail/{id}', function($id){
//     return "Articles Detail $id";
// });

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);


Route::get('/', [ ArticleController::class, 'index']);
Auth::routes();

Route::get('/home', [ArticleController::class, 'index'])->name('home');

Route::post('/comments/add',[CommentController::class, 'create']);
Route::get('/comments/delete/{id}',[CommentController::class, 'delete']);