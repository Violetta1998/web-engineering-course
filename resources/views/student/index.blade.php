@extends('layouts.studentbase')

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
            <p class="card-text">Teacher's name: {{ $subject->user_id }}</p>
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
        <a href="" class="btn btn-primary">Take a subject</a>
      </div>
    </div>

  </div>
@endsection
