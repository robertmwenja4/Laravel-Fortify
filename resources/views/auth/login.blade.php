@extends('template.main')

@section('content')
    <h1>Login</h1>

    <div class="card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-md-6 offset-md-3">
                <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">Log IN with Google</a>
                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">Log IN with Facebook</a>
                <a href="{{ route('login.github') }}" class="btn btn-dark btn-block">Log IN with Github</a>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
              </div>
            <div class="mb-3">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          <a href="{{ route('password.request') }}">Forgot Password?Click Here to reset</a>
    </div>
@endsection