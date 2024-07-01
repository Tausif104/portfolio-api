<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/portfolios', [PortfolioController::class, 'index']);
Route::get('/portfolios/{id}', [PortfolioController::class, 'show']);
Route::post('/portfolios', [PortfolioController::class, 'store']);
Route::get("/portfolios/category/{category}", [PortfolioController::class, 'getByCat']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
