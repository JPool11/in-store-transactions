<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/transactions/summary', [TransactionController::class, 'summary']);
