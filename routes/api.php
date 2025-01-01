<?php

use App\Http\Controllers\Api\ParticipantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::prefix('Api')->as('Api.')->group(function () {

    Route::get('/register', [UserController::class, 'showRegistrationForm']);
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'showLoginForm']);
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::apiResource('participants', ParticipantsController::class);



// });
