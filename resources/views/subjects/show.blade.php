@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-xs-6">
      <h2>{{ $subject->name }}</h2>
      <p>Description: {{ $subject->description }}</p>
      <p>Subject code: {{$subject['subject_code']}}</p>
      <p>Credit value: {{$subject['credit_value']}}</p>
      <p>Date of creation: {{$subject['created_at']}}</p>
      <p>Last modification: {{$subject['updated_at']}}</p>
      <p>Number of students enrolled: </p>
      <a href="{{ route('subjects.edit', [ 'subject' => $subject->id ]) }}" class="btn btn-secondary">Edit</a>
      <form action="{{ route('subjects.destroy', [ 'subject' => $subject->id ]) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Delete</button>
      </form>
      <a href="{{ route('subjects.tasks.create', [ 'subject' => $subject ]) }}" class="btn btn-primary">Add new task</a>
    </div>
    <div class="col-xs-6" style="padding-left: 3%">
        <h2>Tasks</h2>
        @foreach ($subject->tasks as $task)
        <div class="col-xs-12">
          <div class="card h-100">
            <div class="card-body">
              <a class="card-title" href="{{ route('tasks.show', [ 'task' => $task->id ]) }}">Name: {{ $task['name'] }}</a>
              <p class="card-text">Points: {{ $task['points'] }}</p>
              </div>
          </div>
        </div>
      @endforeach
    </div>
</div>

@endsection
