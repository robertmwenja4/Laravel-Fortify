@extends('template.base')

@section('content')
    <h1>Edit Bag Details</h1>

    <div class="card">
      <form method="POST" action="{{ route('luggages.update', $luggage->id) }}">
        @method('PATCH')
        @include('luggages.includes.editform')
      </form>
    </div>
@endsection