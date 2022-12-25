<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get("/tasks", [TaskController::class, 'index']);
Route::get("/tasks/{id}", [TaskController::class, 'show']);
Route::post("/tasks", [TaskController::class, 'store']);
Route::patch("/tasks/{id}", [TaskController::class, 'update']);
Route::delete("/tasks/{id}", [TaskController::class, 'destroy']);



