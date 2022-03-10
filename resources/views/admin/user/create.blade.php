@extends('template.base')

@section('content')
    <h1>Create New User</h1>

    <div class="card">
      <form method="POST" action="{{ route('admin.users.store') }}">
        @include('admin.user.includes.form', ['create' => true])
      </form>
    </div>
@endsection