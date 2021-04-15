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

    public function evaluate(Task $task, Solution $solution, Request $request){
        $validated_data = $request->validate([
            'earned_points' => 'required|numeric|min:0|max:10'
        ]);
        $validated_data['evaluated_time'] = date('Y-m-d H:i:s');
        $solution->update($validated_data);

        return redirect()->route('tasks.show', [ 'task' => $task->id ]);
    }
}
