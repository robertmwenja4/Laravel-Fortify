@csrf
        <div class="mb-3">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" 
                    value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset">
          @error('name')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
                    value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
          </div>
        @isset($create)
        <div class="mb-3">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password_confirmation">Password confirmation</label>
            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
          </div>
        @endisset
        
        <div class="mb-3">
          @foreach ($roles as $role )
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}"
                      id="{{ $role->name }}" @isset($user)
                          @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                              checked
                          @endif
                      @endisset>
              <label for="{{ $role->name }}" class="form-check-label">
                {{ $role->name }}
              </label>
            </div>
          @endforeach
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>