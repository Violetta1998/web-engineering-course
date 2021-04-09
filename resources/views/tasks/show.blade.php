@extends('layouts.base')

@section('content')
    <div class="container py-3">
      <h2>{{ $task->name }}</h2>
      <p>Description: {{ $task->description }}</p>
      <p>Points: {{$task['points']}}</p>
      <p>Number of submitted solutions: </p>
      <p>Number of evaluated solutions: </p>
      <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="btn btn-secondary">Edit</a>
    </div>
@endsection
