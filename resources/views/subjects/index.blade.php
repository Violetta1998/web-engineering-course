@extends('layouts.base')

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
            <a href="{{route('subjects.show', [ 'subject' => $subject->id ]) }}" class="btn btn-primary">Open</a>
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
@endsection
