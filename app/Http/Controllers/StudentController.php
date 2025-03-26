<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\EvaluateStudentRequest;
use App\Models\Evaluation;
use App\Models\Student;
use App\Models\StudentEvaluation;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showStudent() {
        $students = Student::paginate('25');
        
        return view('student.create', ['students' => $students]);
    }

    public function createStudent(CreateStudentRequest $request) {
        $student = Student::create($request->validated());
    
        return redirect()->route('student.create')->with(['success' => "L'élève $student->firstname $student->lastname a bien été enregistré !"]);
    }


    public function evaluateStudent(Student $student, Evaluation $evaluation, EvaluateStudentRequest $request){
        $points = $request->validated()['points'];
        $studentEval = StudentEvaluation::where(['evaluation_id' => $evaluation->id, 'student_id' => $student->id])->first();

        if($studentEval === null){
            $studentEval = StudentEvaluation::create(['evaluation_id' => $evaluation->id, 'student_id' => $student->id, 'points' => $points]);
        }
        else{
            $studentEval->points = $points;
            $studentEval->save();
        }

        return redirect()->route('evaluation.show', ['id' => $evaluation->id])->with(['success' => "La note de $points / $evaluation->max_points a été attribuée à $student->firstname $student->lastname"]);
    }

    public function createNote() {

    }

    public function showRanking() {

    }
}
