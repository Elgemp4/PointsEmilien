<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = ['firstname', 'lastname'];

    public function studentEvaluations() {
        return $this->hasMany(StudentEvaluation::class);
    }
}
