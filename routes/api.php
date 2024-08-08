<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/auth/register', [RegisterController::class, 'register']);
Route::get('/student', function (Request $request) {
    return response()->json(['Message' => "Aung Aung is the best"]);
});
