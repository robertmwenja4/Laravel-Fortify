@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="float-left">View Bags</h1>
    </div>
    <div class="form-inline my-2 my-lg-0">
          <span class="las la-search"></span>
          <input type="search" placeholder="Search here"/>
      </div>
</div>
<div class="card">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Passanger ID</th>
            <th scope="col">Name</th>
            <th scope="col">Bag ID</th>
            <th scope="col">Terminal</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $bag)
        <tr>
            <th scope="row">{{ $bag->id }}</th>
            <td>{{ $bag->pid }}</td>
            <td>{{ $bag->name }}</td>
            <td>{{ $bag->cardID }}</td>
            <td>{{ $bag->Terminal_at }}</td>
            <td>
                @if($bag->Terminal_at =='Bag Passed Checkin 2')
                <a class="btn btn-sm btn-primary" href="#" role="button" >Loaded</a>
                @else
                <a class="btn btn-sm btn-danger" href="#" role="button" >Missing</a>
                @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection