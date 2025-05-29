<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'getProjects']);
Route::get('/project/{slug}', [ProjectController::class, 'getProjectBySlug']);

Route::get('/blogs', [BlogController::class, 'getBlogs']);
Route::get('/blog/{slug}', [BlogController::class, 'getBlogBySlug']);
Route::get('/info', [InfoController::class, 'getInfo']);