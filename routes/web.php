<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/addpegawai', [EmployeeController::class, 'addpegawai'])->name('addpegawai');
Route::post('/insertpegawai', [EmployeeController::class, 'insertpegawai'])->name('insertpegawai');
Route::get('/updatepegawai/{id}', [EmployeeController::class, 'updatepegawai'])->name('updatepegawai');
Route::post('/editpegawai/{id}', [EmployeeController::class, 'editpegawai'])->name('editpegawai');
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');