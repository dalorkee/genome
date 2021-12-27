<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,GisAidController};

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
	return view('auth.login');
});
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
// Route::get('/dashboard', function () {
// 	return view('dashboard.index');
// })->middleware(['auth'])->name('dashboard');
Route::resources([
	'gisaid' => GisAidController::class,
]);
Route::name('gisaid.')->group(function() {
	Route::get('/dashboard/gisaid', [GisAidController::class, 'dashboard'])->name('dashboard');
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

require __DIR__.'/auth.php';


