@extends('layouts.studentbase')

@section('content')
<div class="col-xs-6" style="padding-left: 3%">
    @foreach($subject as $subject)
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $subject['name'] }}</h5>
            <p class="card-text">{{ $subject['description'] }}</p>
            <p class="card-text">Subject code: {{ $subject['subject_code'] }}</p>
            <p class="card-text">Credit value: {{ $subject['credit_value'] }}</p>
            <p class="card-text">Teacher's name: {{ $subject->teacher->name }}</p>
            <a href="{{ route('subjects.save', [ 'id' => $subject->id ]) }}" class="btn btn-primary">Take a subject</a>
          </div>
      </div>
    @endforeach
</div>
@endsection
