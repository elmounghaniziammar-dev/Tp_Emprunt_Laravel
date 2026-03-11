<?php

use App\Http\Controllers\LoansController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('loans',LoansController::class);
Route::patch('/loans/{id}/return',[LoansController::class,'markAsReturned']);