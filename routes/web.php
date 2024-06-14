<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::get('/article/import', [ArticleController::class, 'import']);//->withoutMiddleware(ValidateCsrfToken::class);
