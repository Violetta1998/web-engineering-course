<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Subject;
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
        return view('tasks.show', [
            'task' => $task
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
