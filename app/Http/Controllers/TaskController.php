<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Models\Task;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    public function create(Subject $subject)
    {
        return view('tasks.create', [
            'subject_id' => $subject->id
        ]);
    }

    public function show(Task $task) {
        $user = Auth::user();

        $corresponding_solutions = $task->solutions()->get();
        $number_of_submitted = count($corresponding_solutions); //it's always in the database
        //dd($number_of_submitted);
        $number_of_not_evaluated = $corresponding_solutions->where('evaluated_at', '!=', 'null'); //only if evaluated_at !=null
        //dd($number_of_not_evaluated);
        $number_of_evaluated = $number_of_submitted - count($number_of_not_evaluated);
        //dd($number_of_evaluated);

        return view('tasks.show', [
            'task' => $task,
            'is_teacher'=> $user->is_teacher,
            'submitted'=> $number_of_submitted,
            'evaluated'=> $number_of_evaluated,
            'solutions' => $corresponding_solutions
        ]);
    }

    public function edit(Task $task){
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function update(Task $task, Request $request){
        $validated_data = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|numeric'
        ]);

        $task->update($validated_data);

        return redirect()->route('subjects.show', [ 'subject' => $task->subject_id ]);
    }

    public function store(Subject $subject, Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|numeric'
        ]);
        //$validated_data['subject_id'] = Subject::id();
        $subject->tasks()->create($validated_data);
        //Task::create($validated_data);
        return redirect()->route('subjects.show', [ 'subject' => $subject->id ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('subjects.show', [ 'subject' => $task->subject_id ]);
    }
}
