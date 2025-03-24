<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Student;
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

    public function showNote() {

    }

    public function createNote() {

    }

    public function showRanking() {

    }
}
