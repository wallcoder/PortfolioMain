<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/api/posts', [PostController::class, 'index']);
