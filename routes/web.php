<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FAQController;

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
    return view('pages/index');
});
Route::group(['middleware' => ['web']], function() {
  Route::get('page', PageController::class);
  Route::get('page/index', [PageController::class, 'index']);
  Route::get('page/lessons', [PageController::class, 'lessons']);
  Route::get('page/aboutus', [PageController::class, 'aboutus']);
  Route::get('page/profile', [PageController::class, 'profile']);
  Route::get('page/logout', [PageController::class, 'logout']);
  Route::post('page/login', [PageController::class, 'login']);
  Route::post('page/register', [PageController::class, 'register']);
  Route::get('page/teacher', [PageController::class, 'teacher']);
  Route::get('lessons/index/', [LessonsController::class, 'index']);
  Route::get('lessons/exercise/', [LessonsController::class, 'exercise']);
  Route::get('lessons/exercisesubmit/', [LessonsController::class, 'exercisesubmit']);
  Route::get('lessons/quiz/', [LessonsController::class, 'quiz']);
  Route::post('lesson/add_comment', [LessonsController::class, 'add_comment']);
  Route::get('lesson/fetch_comment', [LessonsController::class, 'fetch_commnent']);
  Route::get('forum/index', [ForumController::class, 'index']);
  Route::get('forum/create_post', [ForumController::class, 'create_post']);
  Route::get('forum/post', [ForumController::class, 'post']);
  Route::post('forum/add_comment', [ForumController::class, 'add_comment']);
  Route::get('forum/fetch_comment', [ForumController::class, 'fetch_commnent']);
  Route::post('forum/add_post', [ForumController::class, 'add_post']);
  Route::get('FAQ/index', [FAQController::class, 'index']);
});
