@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="float-left">Flights</h1>
        <a class="btn btn-sm btn-success float-right" style="float: right" href="{{ route('admin.flights.create') }}" role="button" >Add New Flight</a>
    </div>
</div>
<div class="card">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Flight Number</th>
            <th scope="col">Origin</th>
            <th scope="col">Destination</th>
            <th scope="col">Flight Status</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $flight)
        <tr>
            <th scope="row">{{ $flight->id }}</th>
            <td>{{ $flight->flight_no }}</td>
            <td>{{ $flight->origin }}</td>
            <td>{{ $flight->destination }}</td>
            <td>{{ $flight->flight_status }}</td>
            <td>
                @if($flight->no_bags > $num)
                {{ dd($dd) }}
                <a class="btn btn-sm btn-danger" href="#" role="button" >Hold On</a>
                @else
                <a class="btn btn-sm btn-primary" href="#" role="button" >{{ $flight->no_bags }}</a>
                @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection