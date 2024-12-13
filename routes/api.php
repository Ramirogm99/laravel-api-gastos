<?php

use App\Http\Controllers\LoginApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::post("logout", [ LoginApiController::class , "logout"])->name("logoutApi");
    Route::post("login",[ LoginApiController::class , "login"])->name("loginApi");
});
