@extends('layouts.base')

@section('content')
@if ($is_teacher==1)
    <div class="container py-3">
      <h2>{{ $task->name }}</h2>
      <p>Description: {{ $task->description }}</p>
      <p>Points: {{$task['points']}}</p>
      <p>Number of submitted solutions: {{$submitted}}</p>
      <p>Number of evaluated solutions: {{$evaluated}}</p>
      <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="btn btn-secondary">Edit</a>
    </div>

    <div class="col-xs-6">
        <h2>Subitted solutions</h2>
        @foreach ($solutions as $solution)
        <div class="col-xs-12">
          <div class="card h-100">
            <div class="card-body">
              <p class="card-text">Student's name: {{$solution->student_name}}</p>
              <p class="card-text">Sudent's email: {{$solution->student_email}}</p>
              <p class="card-text">Sumitted time: {{$solution->submitted_time}}</p>
              @if ($solution->evaluated_time!=null)
              <p class="card-text">Evaluated time: {{$solution->evaluated_time}}</p>
              <p class="card-text">Earned points: {{$solution->earned_points}}</p>
              </div>
              @endif
          </div>
          @if ($solution->evaluated_time==null)
          <div class="col-sm-3 my-3">
            <div class="card h-100">
              <a href="{{route('solutions.show', [ 'solution' => $solution->id ])}}" class="btn btn-primary">Evaluate</a>
            </div>
          </div>
          @endif
        </div>

      @endforeach
    </div>

@endif

@if ($is_teacher==0)
<div class="container py-3">
    <h2>{{ $task->name }}</h2>
    <p>Description: {{ $task->description }}</p>
    <p>Teacher's name: {{$task->subject->teacher->name}}</p>
    <p>Points: {{$task['points']}}</p>
    @foreach ($task->solutions as $solution)
        @if ($user->email == $solution->student_email)
            <p class="card-text">Submitted: YES </p>
        @endif
    @endforeach
</div>

<form action="{{ route('tasks.solutions.store', [ 'task' => $task->id ]) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="solution_text">Write your solution below</label>
        <textarea name="solution_text" class="form-control @error('solution_text') is-invalid @enderror" id="solution_text" rows="3">{{ old('solution_text', '') }}</textarea>
        @error('solution_text')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endif
@endsection
