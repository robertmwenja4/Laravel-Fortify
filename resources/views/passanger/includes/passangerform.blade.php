@csrf
<div class="mb-3">
    <label for="pid">Passanger ID</label>
    <input name="pid" type="text" class="form-control @error('pid') is-invalid @enderror" id="pid" aria-describedby="pid" value="{{ old('pid') }} @isset($passanger) {{ $passanger->pid }} @endisset">
    @error('pid')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
<div class="mb-3">
  <label for="name">Name:</label>
  <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ old('name') }} @isset($passanger) {{ $passanger->name }} @endisset">
  @error('name')
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
<div class="mb-3">
    <label for="fligh_no">Flight Number:</label>
    <input name="fligh_no" type="text" class="form-control @error('fligh_no') is-invalid @enderror" id="fligh_no" aria-describedby="fligh_no" value="{{ old('fligh_no') }} @isset($passanger) {{ $passanger->fligh_no }} @endisset">
    @error('fligh_no')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email">Email</label>
    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ old('email') }} @isset($passanger) {{ $passanger->email }} @endisset">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
<div class="mb-3">
    <label for="phone_number">Phone Number</label>
    <input name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" aria-describedby="phone_number" value="{{ old('phone_number') }} @isset($passanger) {{ $passanger->phone_number }} @endisset">
    @error('phone_number')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="flight_class">Flight Class</label>
    <input name="flight_class" type="text" class="form-control @error('flight_class') is-invalid @enderror" id="flight_class" aria-describedby="flight_class" value="{{ old('flight_class') }} @isset($passanger) {{ $passanger->flight_class }} @endisset">
    @error('flight_class')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="flight_origin">Flight Origin</label>
    <input name="flight_origin" type="text" class="form-control @error('flight_origin') is-invalid @enderror" id="flight_origin" aria-describedby="flight_origin" value="{{ old('flight_origin') }} @isset($passanger) {{ $passanger->flight_origin }} @endisset">
    @error('flight_origin')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="destination">Flight Destination</label>
    <input name="destination" type="text" class="form-control @error('destination') is-invalid @enderror" id="destination" aria-describedby="destination" value="{{ old('destination') }} @isset($passanger) {{ $passanger->destination }} @endisset">
    @error('destination')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3" @can('is-check')
      style="display: none"
  @endcan>
	<label class="col-md-3 control-label">Boarding Status </label>
	<div class="col-md-9">
        @php ($names = ['Missing','Boarded','Offloaded'])
		<select class="form-control" name="status">
			<option value="Missing">Missing</option>
            <option value="Boarded">Boarded</option>
			<option value="Off-Loaded">Off-Loaded</option>	
					
		</select>
	</div>
</div>
{{-- <div class="mb-3" style="display:none">
	<label class="col-md-3 control-label">Missing</label>
    <div class="col-md-9">
    <input type="text" name="status[]" value="{{ $names[0] }}" class="form-control" placeholder="Missing" > </div>
</div>
<div class="mb-3" style="display:none">
	<label class="col-md-3 control-label">Boarded</label>
    <div class="col-md-9">
    <input type="text" name="status[]" value="{{ $names[1] }}" class="form-control" placeholder="Boarded" > </div>
</div>
<div class="mb-3" style="display:none">
	<label class="col-md-3 control-label">Offloaded</label>
    <div class="col-md-9">
    <input type="text" name="status[]" value="{{ $names[2] }}" class="form-control" placeholder="Offloaded" > </div>
</div> --}}
<div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>