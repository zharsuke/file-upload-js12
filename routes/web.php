<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/file-upload', [FileUploadController::class, 'fileUpload']);
Route::post('/file-upload', [FileUploadController::class, 'prosesFileUpload']);

Route::get('/file-upload-assignment', [FileUploadController::class, 'fileUploadAssignment']);
Route::post('/file-upload-assignment', [FileUploadController::class, 'prosesFileUploadAssignment']);