<?php

use Illuminate\Support\Facades\Route;
use App\Category\Controller\CategoryController;

//  Middleware: limit 5 queries in minute
Route::get('appTopCategory',[CategoryController::class, 'getTop'])->middleware('throttle:5,1');
Route::post('',[CategoryController::class, 'save']);
