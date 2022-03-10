@extends('template.base')

@section('content')
    <h1>Add Flights Page</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.flights.store') }}">
            @include('flights.includes.flightform')
            
        </form>
    </div>
@endsection