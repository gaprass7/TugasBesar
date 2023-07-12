<?php

use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PembelajaranController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('adminpage.index');
// });

Route::get('/dashboard', function () {
    return view('adminpage.dashboard.index');
});

// Route::get('/kursus', function () {
//     return view('adminpage.kursus.index');
// });
Route::resource('kursus', KursusController::class);

// Route::get('/materi', function () {
//     return view('adminpage.materi.index');
// });
Route::resource('materi', MateriController::class);


Route::resource('pembelajaran', PembelajaranController::class);