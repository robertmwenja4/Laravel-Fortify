@csrf
        <div class="mb-3">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" 
                    value="{{ auth()->user()->name }}">
          @error('name')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
          @enderror
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
                    value="{{ auth()->user()->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
          </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>