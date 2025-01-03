<?php

// use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Resources\ParticipantResource;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\PhoneController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::prefix('Api')->as('Api.')->group(function () {

    Route::get('/register', [UserController::class, 'showRegistrationForm']);
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'showLoginForm']);
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/usersaved', [UserController::class, 'usersaved']);
    //users
    Route::apiResource('users', UserController::class);
    Route::apiResource('usersget', UserController::class);
    //participants
    Route::apiResource('participants', ParticipantController::class);
    //categories
    Route::apiResource('categories', CategoryController::class);
    //phone
    Route::apiResource('phones', PhoneController::class);
    // Route::post('/phoneusers', [PhoneController::class, 'phoneusers'])->name('phoneusers');


//} );
