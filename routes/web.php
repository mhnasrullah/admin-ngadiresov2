<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaCon;

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

Route::get('/berita', [beritaCon::class, 'index']);
Route::get('/berita/create', [beritaCon::class, 'create']);
Route::post('/berita/store', [beritaCon::class, 'store']);
Route::get('/berita/edit/{id}', [beritaCon::class, 'edit']);
Route::post('/berita/update/{id}', [beritaCon::class, 'update']);
Route::get('/berita/delete/{id}', [beritaCon::class, 'destroy']);