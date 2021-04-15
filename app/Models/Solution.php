<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'student_name', 'student_email ', 'earned_points', 'task_id', 'submitted_time', 'evaluated_time', 'solution_text'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
