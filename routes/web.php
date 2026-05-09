<?php

use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return view('welcome'); });
Route::post('/submit-form', [SubmissionController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/report', [SubmissionController::class, 'index']);
    Route::get('/admin/change-password', [AuthController::class, 'showChangePasswordForm']);
    Route::post('/admin/change-password', [AuthController::class, 'updatePassword']);
});