<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BaseController::class,'index']);
Route::get('/base', [BaseController::class,'base']);
Route::post('/login', [BaseController::class,'login']);
Route::post('/logout', [BaseController::class,'logout'])->name('logout');

Route::prefix('pegawai')->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::post('/create', [PegawaiController::class, 'store'])->name('pegawai.create');
    Route::put('/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/delete/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');
});
