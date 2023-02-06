<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\AuthController;

use App\Http\Controllers\v1\PeopleController;
use App\Http\Controllers\v1\HistorystatuController;

 

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group(function () {

		Route::prefix('peoples')->group(function () {
			Route::get('/', [PeopleController::class, 'index']);
			Route::get('/{uuid}', [PeopleController::class, 'show']);
			Route::post('/', [PeopleController::class, 'store']);
			Route::put('/{uuid}', [PeopleController::class, 'update']);
		});

		Route::prefix('historystatus')->group(function () {
			Route::get('/', [HistorystatuController::class, 'indexStatus']);
			Route::get('/{uuid}', [HistorystatuController::class, 'showStatus']);
		});

});
