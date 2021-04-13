@extends('layouts.base')

@section('content')
@if ($is_teacher==1)
    <div class="container py-3">
      <h2>{{ $task->name }}</h2>
      <p>Description: {{ $task->description }}</p>
      <p>Points: {{$task['points']}}</p>
      <p>Number of submitted solutions: </p>
      <p>Number of evaluated solutions: </p>
      <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="btn btn-secondary">Edit</a>
    </div>
@endif

@if ($is_teacher==0)
<div class="container py-3">
    <h2>{{ $task->name }}</h2>
    <p>Description: {{ $task->description }}</p>
    <p>Teacher's name: {{$task->subject->teacher->name}}</p>
    <p>Points: {{$task['points']}}</p>
    <p>Submitted: </p>
</div>
<div class="form-group">
    <label for="solution">Write your solution below</label>
    <textarea name="solution" class="form-control @error('solution') is-invalid @enderror" id="solution" rows="3">{{ old('solution', '') }}</textarea>
      @error('solution')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
@endif
@endsection
