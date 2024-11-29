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
Route::get('/codepenlist/edit/{id}', [CodepenListController::class, 'edit'])->name('codepenlist.edit');
Route::post('/codepenlist/save', [CodepenListController::class, 'save'])->name('codepenlist.save');
Route::post('/codepenlist/update/{id}', [CodepenListController::class, 'update'])->name('codepenlist.update');
Route::delete('/codepenlist', [CodepenListController::class, 'delete'])->name('codepenlist.delete');

require __DIR__.'/auth.php';
