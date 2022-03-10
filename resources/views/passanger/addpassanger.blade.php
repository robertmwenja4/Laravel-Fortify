@extends('template.base')

@section('content')
    <h1>Add Passangers</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.passanger.store') }}">
            @include('passanger.includes.passangerform')
            
        </form>
    </div>
    
@endsection