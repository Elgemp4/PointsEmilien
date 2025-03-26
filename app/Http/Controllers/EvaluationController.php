<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEvaluationRequest;
use App\Models\Evaluation;
use App\Models\Student;
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

    public function listEvaluations(Request $request) {
        return view("evaluation.list", ["evaluations" => Evaluation::paginate(25)]);
    }

    public function showEvaluationById($id) {
        return view("evaluation.show", ["evaluation" => Evaluation::findOrFail($id), 'students' => Student::paginate(25)]);
    }
}
