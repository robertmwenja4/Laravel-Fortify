@extends('template.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">Users</h1>
            <a class="btn btn-sm btn-success float-right" style="float: right" href="{{ route('admin.users.create') }}" role="button" >Create</a>
        </div>
    </div>
    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($user as $users)
            <tr>
                <th scope="row">{{ $users->id }}</th>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $users->id) }}" role="button" >Edit</a>
                    <button type="button" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $users->id }}').submit();">
                        Delete
                    </button>
                    <form id="delete-form-{{ $users->id }}" action="{{ route('admin.users.destroy', $users->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          {{ $user->links() }}
    </div>
@endsection