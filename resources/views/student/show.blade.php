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
      <a href="{{ route('subjects.edit', [ 'subject' => $subject->id ]) }}" class="btn btn-secondary">Take</a>
      </div>
</div>

@endsection
