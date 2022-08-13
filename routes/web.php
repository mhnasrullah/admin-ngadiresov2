<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaCon;
use App\Http\Controllers\wisataCon;

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

Route::get('/wisata', [wisataCon::class, 'index']);
Route::get('/wisata/create', [wisataCon::class, 'create']);
Route::post('/wisata/store', [wisataCon::class, 'store']);
Route::get('/wisata/edit/{id}', [wisataCon::class, 'edit']);
Route::post('/wisata/update/{id}', [wisataCon::class, 'update']);
Route::get('/wisata/delete/{id}', [wisataCon::class, 'destroy']);