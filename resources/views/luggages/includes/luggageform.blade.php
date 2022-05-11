@csrf
<div class="mb-3">
    <label for="cardID">Bag Tag ID</label>
    <input name="cardID" type="text" class="form-control @error('cardID') is-invalid @enderror" id="cardID" aria-describedby="cardID" value="{{ $user }} @isset($luggages) {{ $luggages->cardID }} @endisset" readonly>
    @error('cardID')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
<div class="mb-3">
  <label for="bag_weight">Bag Weight</label>
  <input name="bag_weight" type="text" class="form-control @error('bag_weight') is-invalid @enderror" id="bag_weight" aria-describedby="bag_weight" value="{{ old('bag_weight') }} @isset($luggages) {{ $luggages->bag_weight }} @endisset">
  @error('bag_weight')
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
<div class="mb-3">
    <label for="pid">Passanger ID</label>
    <input name="pid" type="text" class="form-control @error('pid') is-invalid @enderror" id="pid" aria-describedby="pid" value="{{ old('pid') }} @isset($luggages) {{ $luggages->pid }} @endisset">
    @error('pid')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>