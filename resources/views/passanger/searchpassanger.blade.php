@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
      <h1 class="float-left">Passengers</h1>
      @cannot('is-boardonly')
        <a class="btn btn-sm btn-success float-right" style="float: right" href="{{ route('admin.passanger.create') }}" role="button" >Create New Passenger</a>
      @endcannot
    </div>
</div>
<div>
    <form class="form-inline" style="margin-bottom: 1rem" type="get" action="{{ url('searchPassanger') }}">
      <input class="form-control mr-sm-2" name="passSearch" type="search" placeholder="Search Passenger ID" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
<div class="card">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Passanger Id</th>
            <th scope="col">Name</th>
            <th scope="col">Flight Number</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Flight Class</th>
            <th scope="col">Origin</th>
            <th scope="col">Destination</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($passangers as $passanger)
        <tr>
            <th scope="row">{{ $passanger->id }}</th>
            <td>{{ $passanger->pid }}</td>
            <td>{{ $passanger->name }}</td>
            <td>{{ $passanger->fligh_no }}</td>
            <td>{{ $passanger->email }}</td>
            <td>{{ $passanger->phone_number }}</td>
            <td>{{ $passanger->flight_class }}</td>
            <td>{{ $passanger->flight_origin }}</td>
            <td>{{ $passanger->destination }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.passanger.edit', $passanger->id) }}" role="button" >Edit</a>
                @cannot('is-boardonly')
                    <button type="button" class="btn btn-sm btn-danger"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $passanger->id }}').submit();">
                    Delete
                </button>
                <form id="delete-form-{{ $passanger->id }}" action="{{ route('admin.passanger.destroy', $passanger->id) }}" method="POST" style="display: none">
                    @csrf
                    @method("DELETE")
                </form>
                @endcannot
                
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection