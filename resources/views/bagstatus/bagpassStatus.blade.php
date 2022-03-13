@extends('template.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="float-left">View Passanger and Bags Status</h1>
    </div>
    <div>
          <span class="las la-search"></span>
          <input type="search" placeholder="Search here"/>
      </div>
</div>
<div class="card">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Passanger ID</th>
            <th scope="col">Name</th>
            <th scope="col">Bag ID</th>
            <th scope="col">Terminal</th>
            <th scope="col">Passanger Status</th>
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
            <td>{{ $bag->status }}</td>
            <td>
                @if ($bag->status == "Boarded" && $bag->Terminal_at == "CheckIn 2")
                <a class="btn btn-sm btn-success" href="#" role="button" >Ready</a>
                @elseif ($bag->status == "Boarded" && $bag->Terminal_at != "CheckIn 2")
                    <a class="btn btn-sm btn-danger" href="#" role="button" >Bag Missing</a>
                @elseif ($bag->status == "Missing" && $bag->Terminal_at == "CheckIn 2")
                    <a class="btn btn-sm btn-primary" href="#" role="button" >Passanger Missing</a>
                @elseif ($bag->status == "Missing" && $bag->Terminal_at != "CheckIn 2")
                    <a class="btn btn-sm btn-danger" href="#" role="button" >Both Missing</a>
                @elseif ($bag->status == "Off-Loaded" && $bag->Terminal_at == "CheckIn 2")
                    <a class="btn btn-sm btn-info" href="#" role="button" >Passanger OFF</a>
                @elseif ($bag->status == "Off-Loaded" && $bag->Terminal_at != "CheckIn 2")
                    <a class="btn btn-sm btn-secondary" href="#" role="button" >OFFLoaded</a>
                @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection