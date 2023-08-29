<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');

Route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/', function () {
    return view('welcome');
});
