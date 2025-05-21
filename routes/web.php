<?php

use App\Http\Controllers\PrizeController;
use Illuminate\Support\Facades\Route;


Route::controller(PrizeController::class)->group(function (){
    Route::get('/','index');
    Route::get('prizes/create','create');
    Route::post('prizes/store','store');
    Route::get('prizes/edit/{prize}','edit');
    Route::patch('prizes/update/{prize}','update');
    Route::get('prizes/delete/{prize}','destroy');
    Route::post('prizes/simulate','simulate');
    Route::get('prizes/reset','reset');


});
