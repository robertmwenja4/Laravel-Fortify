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
            <th scope="col">Pass ID</th>
            <th scope="col">Name</th>
            <th scope="col">Terminal</th>
            <th scope="col">Flight Number</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data1 as $flight)
        <tr>
            <td>{{ $flight->pid }}</td>
            <td>{{ $flight->name }}</td>
            <td>{{ $flight->Terminal_at }}</td>
            <td>{{ $flight->fligh_no }}</td>
            <td>
              
                {{-- @if($flight->no_bags > $num)
                dd({{ $flight->no_bags }});
                <a class="btn btn-sm btn-danger" href="#" role="button" >Hold On{{ dd($dd) }}</a>
                @else
                <a class="btn btn-sm btn-primary" href="#" role="button" >{{ $flight->no_bags }}</a>
                @endif --}}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection