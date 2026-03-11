<?php

use App\Http\Controllers\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('loans',LoanController::class);
Route::patch('/loans/{id}/return',[LoanController::class,'markAsReturned']);