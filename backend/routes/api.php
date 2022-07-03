<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;




Route::apiResource('/person', PersonController::class)
    ->only(['index','show', 'store', 'update', 'destroy']);

Route::apiResource('/contact', ContatcController::class)
    ->only(['index','show', 'store', 'update', 'destroy']);
    
Route::apiResource('/physicalperson', PhysicalPersonController::class)
    ->only(['index','show', 'store', 'update', 'destroy']);