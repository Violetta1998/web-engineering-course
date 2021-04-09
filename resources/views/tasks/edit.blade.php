@extends('layouts.base')

@section('content')
  <h2>Edit task</h2>
  <form action="{{route('tasks.update', [ 'task' => $task->id ]) }}" method="post">
    @method('put')
    @csrf

    <div class="form-group">
      <label for="name">Task name</label>
      <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder=""
      value="{{ old('name', $task['name']) }}">

      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $task['description']) }}</textarea>
      @error('description')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

      <div class="form-group">
        <label for="points">Points</label>
        <input name="points" type="text" class="form-control @error('points') is-invalid @enderror" id="points" placeholder="{{$task['points']}}"
        value="{{ old('points', $task['points']) }}">
        @error('points')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update task</button>
    </div>

  </form>
@endsection
