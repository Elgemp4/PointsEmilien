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

    Route::get('/evaluation', 'showNote')->name('evaluation')->where(['id' => '[0-9]+']);

    Route::post('evaluation', 'createNote');

    Route::post('/{student}/evaluate/{evaluation}', 'evaluateStudent');

    Route::get('ranking', 'showRanking')->name('ranking');
});

Route::controller(EvaluationController::class)->name('evaluation.')->prefix('/evaluation')->group(function() {
    Route::get('create', 'showEvaluation')->name('create');

    Route::post('create', 'createEvaluation');

    Route::get('', 'listEvaluations')->name('list');

    Route::get('{id}', 'showEvaluationById')->name('show')->where(['id' => '[0-9]+']);
});


