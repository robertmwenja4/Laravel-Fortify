@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="float-left">View Bags</h1>
    </div>
</div>
<div>
  <form class="form-inline" style="margin-bottom: 1rem">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
<div class="card">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Passanger ID</th>
            <th scope="col">Name</th>
            <th scope="col">Bag ID</th>
            <th scope="col">Terminal</th>
            <th scope="col">Check Time</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $bag)
        <tr>
            <td>{{ $bag->pid }}</td>
            <td>{{ $bag->name }}</td>
            <td>{{ $bag->cardID }}</td>
            <td>{{ $bag->Terminal_at }}</td>
            <td>{{ $bag->created_at }}</td>
            <td>
                @if($bag->Terminal_at =='Sort Area 2')
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