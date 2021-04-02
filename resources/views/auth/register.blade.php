@extends('layouts.base')
@section('content')
<div class="wrapper">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
    @csrf
      <h2 class="form-signin-heading">Register</h2>

      <input id="name" placeholder = "Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required="" autocomplete="email" autofocus="" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="" autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      </form>
</div>
@endsection
