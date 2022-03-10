@extends('template.main')

@section('content')
    <h1>Register</h1>

    <div class="card">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ old('name') }}">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
              </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
              </div>
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection