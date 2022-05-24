@csrf
<div class="mb-3">
    <label for="flight_no">Flight Number</label>
    <input name="flight_no" type="text" class="form-control @error('flight_no') is-invalid @enderror" id="flight_no" aria-describedby="flight_no" value="{{ old('flight_no') }} @isset($flight) {{ $flight->flight_no }} @endisset">
    @error('flight_no')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
<div class="mb-3">
  <label for="destination">Destination:</label>
  <input name="destination" type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" aria-describedby="destination" value="{{ old('destination') }} @isset($flight) {{ $flight->destination }} @endisset">
  @error('destination')
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
<div class="mb-3">
    <label for="origin">Origin:</label>
    <input name="origin" type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" aria-describedby="origin" value="{{ old('origin') }} @isset($flight) {{ $flight->origin }} @endisset">
    @error('origin')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="date">Date</label>
    <input name="date" type="text" class="form-control @error('date') is-invalid @enderror" id="date" aria-describedby="date" value="{{ old('date') }} @isset($flight) {{ $flight->date }} @endisset">
    @error('date')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
<div class="mb-3">
    <label for="flight_status">Flight Status</label>
    <input name="flight_status" type="text" class="form-control @error('flight_status') is-invalid @enderror" id="flight_status" aria-describedby="flight_status" value="{{ old('flight_status') }} @isset($flight) {{ $flight->flight_status }} @endisset">
    @error('flight_status')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
{{-- <div class="mb-3">
    <label for="no_bags">No. of Bags</label>
    <input name="no_bags" type="text" class="form-control @error('no_bags') is-invalid @enderror" id="no_bags" aria-describedby="no_bags" value="{{ old('no_bags') }} @isset($flight) {{ $flight->no_bags }} @endisset">
    @error('no_bags')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div> --}}
<div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>