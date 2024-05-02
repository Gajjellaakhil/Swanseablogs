<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AnalyticController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/articles', function () {
    return view('articles');
})->middleware(['auth', 'verified'])->name('articles');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('/articles/user/{userId}', [ArticleController::class, 'viewArticlesByUserId'])->name('article.userId');
    Route::get('/articles/myArticles', [ArticleController::class, 'viewLoggedInUserArticles'])->name('article.myArticles');
    Route::get('/article/{article}', [ArticleController::class, 'view'])->name('article.view');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}/edit', [ArticleController::class, 'update'])->name('article.update');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/analytics', [AnalyticController::class, 'analytics'])->name('analytics');
});

Route::get('/access-denied', function () {
    return view('access-denied');
});

require __DIR__.'/auth.php';
