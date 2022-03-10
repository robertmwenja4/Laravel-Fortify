@extends('template.base')

@section('content')
    <h1>Edit Flight</h1>

    <div class="card">
      <form method="POST" action="{{ route('admin.flights.update', $flight->id) }}">
        @method('PATCH')
        @include('flights.includes.editform')
      </form>
    </div>
@endsection