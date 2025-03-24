<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEvaluationRequest;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function showEvaluation() {
        return view("evaluation.create", ["evaluations" => Evaluation::paginate(25)]);
    }

    public function createEvaluation(CreateEvaluationRequest $request) {
        $evaluation = Evaluation::create($request->validated());
        return redirect()->route('evaluation.create')->with(['success' => "Evaluation \"$evaluation->name\" créée !"]);
    }
}
