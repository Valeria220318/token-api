<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\MovieController;

Route::apiResource('characters', CharacterController::class);
Route::apiResource('movies', MovieController::class);


