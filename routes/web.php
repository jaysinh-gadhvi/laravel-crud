<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/{id?}', [UserController::class, 'index'])->name('user.create');
Route::post('user/save', [UserController::class, 'save'])->name('user.save');
Route::get('user/users',[UserController::class, 'table'])->name('users');
Route::post('user/delete', [UserController::class, 'delete'])->name('user.delete');

