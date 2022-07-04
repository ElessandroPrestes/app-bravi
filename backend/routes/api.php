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

});

    
//Route::apiResource('/physicalperson', PhysicalPersonController::class)
  //  ->only(['index','show', 'store', 'update', 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);