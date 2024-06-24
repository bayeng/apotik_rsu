<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ObatKeluarController;
use App\Http\Controllers\Api\ObatMasukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', \App\Http\Controllers\Api\UserController::class);

Route::apiResource('/supliers', \App\Http\Controllers\Api\SuplierController::class);

Route::apiResource('/obats', \App\Http\Controllers\Api\ObatContoller::class);

Route::apiResource('/obatmasuks', \App\Http\Controllers\Api\ObatMasukController::class);

Route::apiResource('/tujuans', \App\Http\Controllers\Api\TujuanController::class);

Route::apiResource('/obatkeluars', ObatKeluarController::class);

Route::post('/login', [\App\Http\Controllers\Api\UserController::class, 'login']);

Route::get('/transaksimasuk', [HomeController::class, 'transaksimasuk']);
Route::get('/transaksikeluar', [HomeController::class, 'transaksikeluar']);
Route::get('/omzet', [HomeController::class, 'omzettoday']);
Route::get('/dangerstok', [HomeController::class, 'dangerstok']);
