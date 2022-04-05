@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="float-left">Flights</h1>
        <a class="btn btn-sm btn-success float-right" style="float: right" href="{{ route('admin.flights.create') }}" role="button" >Add New Flight</a>
    </div>
</div>
<div>
  <form class="form-inline" style="margin-bottom: 1rem" type="get" action="{{ url('searchflight') }}">
    <input class="form-control mr-sm-2" name="flightSearch" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
<div class="card">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Flight Number</th>
            <th scope="col">Destination</th>
            <th scope="col">Origin</th>
            <th scope="col">Date</th>
            <th scope="col">Flight Status</th>
            <th scope="col">No. of Bags</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($flights as $flight)
        <tr>
            <th scope="row">{{ $flight->id }}</th>
            <td>{{ $flight->flight_no }}</td>
            <td>{{ $flight->destination }}</td>
            <td>{{ $flight->origin }}</td>
            <td>{{ $flight->date }}</td>
            <td>{{ $flight->flight_status }}</td>
            <td>{{ $flight->no_bags }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.flights.edit', $flight->id) }}" role="button" >Edit</a>
                <button type="button" class="btn btn-sm btn-danger"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $flight->id }}').submit();">
                    Delete
                </button>
                <form id="delete-form-{{ $flight->id }}" action="{{ route('admin.flights.destroy', $flight->id) }}" method="POST" style="display: none">
                    @csrf
                    @method("DELETE")
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection