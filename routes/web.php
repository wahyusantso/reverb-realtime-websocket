<?php

use App\Events\StudentDataEvent;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('studentdata');
});

Route::post('/delete-student-data', [StudentController::class, 'destroy'])->name('delete.student');
Route::get('/student-form', [StudentController::class, 'index']);
Route::get('/fetch-student-data', [StudentController::class, 'fetchData'])->name('fetch.student.data');
