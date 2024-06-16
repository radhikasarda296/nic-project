<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    "middleware" => ["guest"]
], function(){

    Route::match(["get", "post"], "register", [AuthController::class, "register"])->name("register");

    Route::match(["get", "post"], "login", [AuthController::class, "login"])->name("login");
});

Route::group([
    "middleware" => ["auth"]
], function(){

    // Dashboard
    Route::get("dashboard", [DashboardController::class, "dashboard"])->name("dashboard");

    // Profile
    Route::match(["get", "post"], "profile", [DashboardController::class, "profile"])->name("profile");

    // Password Reset
    Route::match(["get", "post"], "reset-password", [AuthController::class, "resetPassword"])->name("reset-password");

    // View Uploaded Excel Files
    Route::get("view-files", [DashboardController::class, "viewFiles"])->name("view-files");

    // Import Schemes
    Route::match(["get", "post"],"import-scheme", [DashboardController::class, "importScheme"])->name("import.scheme");

    // Logout
    Route::get("logout", [AuthController::class, "logout"])->name("logout");
});
