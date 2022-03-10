@extends('template.base')

@section('content')
    <h1>Edit Passenger</h1>

    <div class="card">
      <form method="POST" action="{{ route('admin.passanger.update', $passanger->id) }}">
        @method('PATCH')
        @include('passanger.includes.passangerform')
      </form>
    </div>
@endsection