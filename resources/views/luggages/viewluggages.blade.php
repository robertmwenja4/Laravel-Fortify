@extends('template.base')

@section('content')
    <div class="row">
      <div class="col-12">
          <h1 class="float-left">View Bags</h1>
          <a class="btn btn-sm btn-success float-right" style="float: right" href="{{ route('luggages.create') }}" role="button" >Add New Bag</a>
      </div>
  </div>
  <div class="card">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Bag ID</th>
              <th scope="col">Bag Weight</th>
              <th scope="col">Passanger ID</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($bags as $bag)
          <tr>
              <th scope="row">{{ $bag->id }}</th>
              <td>{{ $bag->cardID }}</td>
              <td>{{ $bag->bag_weight }}</td>
              <td>{{ $bag->pid }}</td>
              <td>
                  <a class="btn btn-sm btn-primary" href="{{ route('luggages.edit', $bag->id) }}" role="button" >Edit</a>
                  <button type="button" class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('delete-form-{{ $bag->id }}').submit();">
                      Delete
                  </button>
                  <form id="delete-form-{{ $bag->id }}" action="{{ route('luggages.destroy', $bag->id) }}" method="POST" style="display: none">
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