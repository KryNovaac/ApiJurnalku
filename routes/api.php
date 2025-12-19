<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Endpoint: http://localhost:8000/api/users
Route::get('/users', [UserController::class, 'index']);