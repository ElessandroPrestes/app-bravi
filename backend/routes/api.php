<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Auth\AuthController;



Route::group(['middleware' =>['auth:sanctum']], function(){

    Route::apiResources([
        'person' => PersonController::class,
        'contact' =>  ContatcController::class,
        'physicalperson' => PhysicalPersonController::class
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
