<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubCommentController;
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
    return view('welcome');
});

Route::get('blog',[PageController::class,'posts']);
Route::resource('comments',CommentController::class);
Route::resource('subcomment',SubCommentController::class);

Route::resource('posts',PostController::class);
// Route::get('model-name-load/{device_id}',[ModelNameController::class,'loadDeviceWithModels']);

