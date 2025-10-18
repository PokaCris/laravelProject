<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\NewController;
use App\Http\Controllers\NewsCreateController;

Route::get('/', [NewController::class, 'index'])->name('home');

Route::get('/news/create', [NewsCreateController::class, 'create'])->name('news.create');
Route::get('/news/{id}', [NewController::class, 'show'])->name('news.show');
Route::post('/news/store', [NewsCreateController::class, 'store'])->name('news.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';