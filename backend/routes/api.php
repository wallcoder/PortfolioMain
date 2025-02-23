<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/all', [PostController::class, 'all']);
Route::get('/posts/{slug}', [PostController::class, 'show']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::post('/posts/create', [PostController::class, 'store']);
Route::post('/posts/draft', [PostController::class, 'storeDraft']);

Route::put('/posts/{id}/update', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');