@extends('layouts.base')
@section('content')
<div class="wrapper">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
      <h2 class="form-signin-heading">Login</h2>

        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required="" autocomplete="email" autofocus="" />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="" autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <label class="checkbox">
            <input type="checkbox" value="remember" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
</div>
@endsection
