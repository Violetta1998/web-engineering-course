<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Subject::class, 'subject');
    }

    public function index()
    {
        $user = Auth::user();
        if($user->is_teacher==1){
            return view('subjects.index', [
                'subjects' => $user->teacher_subjects,
                'is_teacher' => $user->is_teacher
            ]);
        }
        else{
            return view('subjects.index', [
                'subjects' => $user->student_subjects,
                'is_teacher' => $user->is_teacher
            ]);
        }
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function show(Subject $subject) {
        $user = Auth::user();
        return view('subjects.show', [
            'subject' => $subject,
            'is_teacher' => $user->is_teacher
        ]);
    }

    public function edit(Subject $subject){
        return view('subjects.edit', [
            'subject' => $subject
        ]);
    }

    public function update(Subject $subject, Request $request){
        $validated_data = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'subject_code' => 'required|regex:#IK-SSS[0-9]{3}#',
            'credit_value' => 'required|numeric'
        ]);

        $subject->update($validated_data);

        return redirect()->route('subjects.show', [ 'subject' => $subject->id ]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'subject_code' => 'required|regex:#IK-SSS[0-9]{3}#', //3 numbers from 0 to 9
            'credit_value' => 'required|numeric'
        ]);
        $validated_data['user_id'] = Auth::id();
        Subject::create($validated_data);
        return redirect()->route('subjects.index');
    }

    public function take(){
        $userId = Auth::id();
        $subjects = Subject::whereDoesntHave('students', function($q) use ($userId){
            $q->where('user_id', $userId);
        })->get();

        return view('subjects.take', [
            'subject' => $subjects
        ]);
    }

    public function save(Subject $subject){
        $user = Auth::user();
        $subject->students()->attach($user);
        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $user = Auth::user();
        if($user->is_teacher==1){
            $subject->delete();
            return redirect()->route('subjects.index');
        }
        else{
            $subject->students()->detach($user);
            return redirect()->route('subjects.index');
        }

    }
}
