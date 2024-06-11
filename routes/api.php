<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', \App\Http\Controllers\Api\UserController::class);

Route::apiResource('/supliers', \App\Http\Controllers\Api\SuplierController::class);

Route::apiResource('/obats', \App\Http\Controllers\Api\ObatContoller::class);

Route::apiResource('/obatmasuks', \App\Http\Controllers\Api\ObatMasukController::class);