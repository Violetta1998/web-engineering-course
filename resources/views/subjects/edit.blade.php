@extends('layouts.base')

@section('content')
  <h2>Edit subject</h2>
  <form action="{{route('subjects.update', [ 'subject' => $subject->id ]) }}" method="post">
    @method('put')
    @csrf

    <div class="form-group">
      <label for="name">Subject name</label>
      <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder=""
      value="{{ old('name', $subject['name']) }}">

      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $subject['description']) }}</textarea>
      @error('description')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="subject_code">Subject code</label>
      <input name="subject_code" type="text" class="form-control @error('subject_code') is-invalid @enderror" id="subject_code" placeholder=""
      value="{{ old('subject_code', $subject['subject_code']) }}">
      @error('subject_code')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="form-group">
        <label for="credit_value">Credit value</label>
        <input name="credit_value" type="text" class="form-control @error('credit_value') is-invalid @enderror" id="credit_value" placeholder=""
        value="{{ old('credit_value', $subject['credit_value']) }}">
        @error('credit_value')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update subject</button>
    </div>

  </form>
@endsection
