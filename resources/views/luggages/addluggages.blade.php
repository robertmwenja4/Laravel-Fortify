@extends('template.base')

@section('content')
    <h1>Add Luggages Page</h1>
    <div class="card">
        <form method="POST" action="{{ route('luggages.store') }}">
            @include('luggages.includes.luggageform')
            
        </form>
    </div>
@endsection