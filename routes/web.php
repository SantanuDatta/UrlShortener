<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => '/url'], function () {
    Route::get('/manage', [UrlController::class, 'index'])->name('url.index');
    Route::get('/create', [UrlController::class, 'create'])->name('url.create');
    Route::post('/store', [UrlController::class, 'store'])->name('url.store');
    Route::get('/edit/{url}', [UrlController::class, 'edit'])->name('url.edit');
    Route::patch('/update/{url}', [UrlController::class, 'update'])->name('url.update');
    Route::delete('/destroy/{url}', [UrlController::class, 'destroy'])->name('url.destroy');
    Route::get('/{shorten_url}', [UrlController::class, 'shortenLink'])->name('url.shorten');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
