@extends('layouts.base')
@if ($is_teacher==1)
@section('content')
<div class="row">
    @foreach($subjects as $subject)
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $subject['name'] }}</h5>
            <p class="card-text">{{ $subject['description'] }}</p>
            <p class="card-text">Subject code: {{ $subject['subject_code'] }}</p>
            <p class="card-text">Credit value: {{ $subject['credit_value'] }}</p>
            <a href="{{ route('subjects.show', [ 'subject' => $subject->id ]) }}" class="btn btn-primary">Open</a>
          </div>
        </div>
      </div>
    @endforeach

    <div class="col-sm-3 my-3">
      <div class="card h-100">
        <a href="{{route('subjects.create')}}" class="btn btn-primary">Create a new subject</a>
      </div>
    </div>
  </div>
@endif

@if ($is_teacher==0)
@section('content')
<div class="row">
    @foreach($subjects as $subject)
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $subject['name'] }}</h5>
            <p class="card-text">{{ $subject['description'] }}</p>
            <p class="card-text">Subject code: {{ $subject['subject_code'] }}</p>
            <p class="card-text">Credit value: {{ $subject['credit_value'] }}</p>
            <p class="card-text">Teacher's name: {{ $subject->teacher->name }}</p>
            <a href="{{ route('subjects.show', [ 'subject' => $subject->id ]) }}" class="btn btn-primary">Open</a>
            <form action="{{ route('subjects.destroy', [ 'subject' => $subject->id ]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Leave</button>
            </form></div>
        </div>
      </div>
    @endforeach

    <div class="col-sm-3 my-3">
      <div class="card h-100">
        <a href="{{ route('subjects.take') }}" class="btn btn-primary">Take a subject</a>
      </div>
    </div>

  </div>
@endif
@endsection
