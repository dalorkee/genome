<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController,GisAidController};

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

Route::get('/', [DashboardController::class, 'index']);
//Route::get('/', [GisAidController::class, 'index']);
Route::resources([
	'gisaid' => GisAidController::class,
]);

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

