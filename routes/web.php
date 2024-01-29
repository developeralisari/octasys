<?php

use App\Http\Controllers\AdsenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdsenseController::class, 'showForm']);
Route::post('save', [AdsenseController::class, 'saveAdsenseCode']);
