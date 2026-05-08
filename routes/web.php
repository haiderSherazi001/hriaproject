<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/submit-form', [SubmissionController::class, 'store']);
Route::get('/admin/report', [SubmissionController::class, 'index']);