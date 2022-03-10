@extends('template.base')

@section('content')
    <h1>Edit User</h1>

    <div class="card">
      <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @method('PATCH')
        @include('admin.user.includes.form')
      </form>
    </div>
@endsection