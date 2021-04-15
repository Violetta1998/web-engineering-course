@extends('layouts.base')

@section('content')
<div class="container py-3">
    <h2>{{ $solution->name }}</h2>
    <p>Task description: {{ $solution->task->description}}</p>
    <p>Solution: {{$solution['solution_text']}}</p>
</div>

{{-- {{ route('tasks.solutions.store', [ 'task' => $task_id ]) }} --}}

<form action="{{route ('solutions.evaluate',
                        ['task' => $solution->task->id,
                        'solution'=> $solution->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="earned_points">Points</label>
        <input name="earned_points" type="text" class="form-control @error('earned_points') is-invalid @enderror" id="earned_points"
        value="{{ old('earned_points', '') }}">
        @error('earned_points')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary">Evaluate</button>
    </div>
</form>

@endsection
