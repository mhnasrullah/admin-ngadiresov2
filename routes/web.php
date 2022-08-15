<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaCon;
use App\Http\Controllers\wisataCon;
use App\Http\Controllers\imgWisCon;
use App\Http\Controllers\faqWisCon;
use App\Http\Controllers\faqCon;
use App\Http\Controllers\suratCon;
use App\Http\Controllers\dashCon;

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


Route::get('/', [dashCon::class, 'index']);

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

Route::get('/wisata/{id}/gambar', [imgWisCon::class, 'index']);
Route::post('/wisata/{id}/gambar', [imgWisCon::class, 'store']);
Route::get('/wisata/{id}/gambar/{foto}/delete', [imgWisCon::class, 'destroy']);

Route::get('/wisata/{id}/faq', [faqWisCon::class, 'index']);
Route::post('/wisata/{id}/faq', [faqWisCon::class, 'store']);
Route::get('/wisata/{id}/faq/{faq}/delete', [faqWisCon::class, 'destroy']);

Route::get('/faq', [faqCon::class, 'index']);
Route::post('/faq/store', [faqCon::class, 'store']);
Route::get('/faq/{id}/delete', [faqCon::class, 'destroy']);

Route::get('/dokumen', [suratCon::class, 'index']);
Route::post('/dokumen/store', [suratCon::class, 'store']);
Route::get('/dokumen/{id}/delete', [suratCon::class, 'destroy']);

Route::post('/editable/tentangDesa',[dashCon::class,'updTentangDesa']);
Route::post('/editable/sambKades',[dashCon::class,'updSamKades']);
Route::post('/editable/namaKades',[dashCon::class,'updNamaKades']);
Route::post('/editable/jmlPria',[dashCon::class,'jmlPria']);
Route::post('/editable/jmlWanita',[dashCon::class,'jmlWanita']);
Route::post('/editable/jmlPenduduk',[dashCon::class,'jmlPenduduk']);
Route::post('/editable/jumbotron',[dashCon::class,'updJumbotron']);
Route::post('/editable/imgTentangDesa',[dashCon::class,'updImgTentangDesa']);
Route::post('/editable/imgKades',[dashCon::class,'updImgKades']);
Route::post('/editable/jmbtSejarah',[dashCon::class,'updJmbtSejarah']);
Route::post('/editable/jmbtKabar',[dashCon::class,'updJmbtKabar']);
Route::post('/editable/jmbtFaq',[dashCon::class,'updJmbtFaq']);
Route::post('/editable/jmbtWisata',[dashCon::class,'updJmbtWisata']);
Route::post('/editable/jmbtSurat',[dashCon::class,'updJmbtSurat']);