<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentEvaluation extends Model
{
    protected $fillable = ['points', 'evaluation_id', 'student_id'];
}
