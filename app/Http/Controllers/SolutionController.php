<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Solution;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class SolutionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Solution::class, 'solution');
    }

    public function show(Solution $solution) {
        //dd($solution->task->description);
        return view('solutions.show',[
            'solution' => $solution
        ]);
    }

    public function store(Task $task, Request $request){
        $user = Auth::user();
        $validated_data = $request->validate([
            'solution_text' => 'required'

        ]);
        $validated_data['student_name'] = $user->name;
        $validated_data['student_email'] = $user->email;
        $validated_data['earned_points'] = 0;
        $validated_data['task_id'] = $task->id;
        $validated_data['submitted_time'] = date('Y-m-d H:i:s');
        $validated_data['evaluated_time'] = NULL;

        //dd($validated_data);

        $task->solutions()->create($validated_data);
        //Solution::create($validated_data);
        return redirect()->route('tasks.show', [ 'task' => $task->id ]);
    }

    public function evaluate(Task $task, Solution $solution, Request $request){
        $validated_data = $request->validate([
            'earned_points' => 'required|numeric|min:0|max:10'
        ]);
        $validated_data['evaluated_time'] = date('Y-m-d H:i:s');
        $solution->update($validated_data);

        return redirect()->route('tasks.show', [ 'task' => $task->id ]);
    }
}
