@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="float-left">Flights</h1>
    </div>
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
            <th scope="col">Bags Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $flight)
        <tr>
          <th scope="row">{{ $flight->id }}</th>
          <td>{{ $flight->flight_no }}</td>
          <td>{{ $flight->destination }}</td>
          <td>{{ $flight->origin }}</td>
          <td>{{ $flight->date }}</td>
          <td>{{ $flight->flight_status }}</td>
            <td>
              
                {{-- @if($flight->flight_no == in_array($flight->flight_no, $total)) --}}
                @foreach ($total as $t =>$tv )
                  @foreach ($expectedBags as $bags => $b )
                  @if ($t == $flight->flight_no && $bags == $flight->flight_no)
                  
                  
                  @if ($b > $tv)
                  <a class="btn btn-sm btn-danger" href="#" role="button" >Hold On</a>
                  @else
                  <a class="btn btn-sm btn-success" href="#" role="button" >Release</a>
                  @endif
                  @endif
                  @endforeach
                
                  
                @endforeach
                
                {{-- @else
                @foreach ($total as $t =>$tv )
                <a class="btn btn-sm btn-primary" href="#" role="button" >{{ $tv }}</a>
                @endforeach
                
                @endif --}}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection