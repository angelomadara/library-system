<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * user routes
 */
Route::middleware(['auth', 'verified', 'role:user'])->name('user.')->group(function () {
    Route::get('/user', function () {
        return view('user.index');
    })->name('dashboard');

    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * admin routes
 */

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/books/add', [BookController::class, 'create'])->name('books.add');
    Route::post('/books/add', [BookController::class, 'store'])->name('books.store');
    Route::post('/book/{id}', [BookController::class, 'show'])->name('book.info');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
