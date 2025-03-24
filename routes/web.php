<?php

use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('student.create');
});

Route::controller(StudentController::class)->name("student.")->prefix('/student')->group(function() {
    Route::get('create', 'showStudent')->name('create');

    Route::post('create', 'createStudent');

    Route::get('evaluation', 'showNote')->name('note');

    Route::post('evaluation', 'createNote');

    Route::get('ranking', 'showRanking')->name('ranking');
});

Route::controller(EvaluationController::class)->name('evaluation.')->prefix('/evaluation')->group(function() {
    Route::get('create', 'showEvaluation')->name('create');

    Route::post('create', 'createEvaluation');
});


