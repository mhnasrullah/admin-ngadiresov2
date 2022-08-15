<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\faqApiC;
use App\Http\Controllers\Api\dokumenApiC;
use App\Http\Controllers\Api\dashApiC;
use App\Http\Controllers\Api\beritaApiC;
use App\Http\Controllers\Api\wisataApiC;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('edit',[dashApiC::class,'index']);
Route::get('dokumen',[dokumenApiC::class,'index']);
Route::get('faq',[faqApiC::class,'index']);
Route::get('berita',[beritaApiC::class,'index']);
Route::get('wisata',[wisataApiC::class,'index']);
Route::get('berita/{slug}',[beritaApiC::class,'one']);
Route::get('wisata/{slug}',[wisataApiC::class,'one']);
