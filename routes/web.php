<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Route::get('page', PageController::class);
Route::get('page/index', [PageController::class, 'index']);
Route::get('page/lessons', [PageController::class, 'lessons']);
Route::get('page/aboutus', [PageController::class, 'aboutus']);
