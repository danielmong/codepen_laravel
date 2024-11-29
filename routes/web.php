<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CodepenListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/codepenlist', [CodepenListController::class, 'index'])->name('codepenlist');
Route::get('/codepenlist/create', [CodepenListController::class, 'create'])->name('codepenlist.create');
Route::post('/codepenlist/save', [CodepenListController::class, 'save'])->name('codepenlist.save');

require __DIR__.'/auth.php';
