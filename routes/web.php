<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LessonsController;

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
  Route::get('lessons/index/', [LessonsController::class, 'index']);
  Route::get('lessons/exercise/', [LessonsController::class, 'exercise']);
  Route::get('lessons/exercisesubmit/', [LessonsController::class, 'exercisesubmit']);
});
