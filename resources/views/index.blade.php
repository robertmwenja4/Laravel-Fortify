@extends('template.base')

@section('content')
    
    <div class="cards">
        <div class="card-single">
            <div>
                <h1>{{ $passangers ?? '' }}</h1>
                <span>Passangers</span>
            </div>
            <div>
                <span class="las la-users"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1>{{ $flights ?? '' }}</h1>
                <span>Flights</span>
            </div>
            <div>
                <span class="las la-clipboard-list"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1>{{ $luggages ?? '' }}</h1>
                <span>Bags</span>
            </div>
            <div>
                <span class="las la-shopping-bag"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h1>{{ $users ?? '' }}</h1>
                <span>Users</span>
            </div>
            <div>
                <span class="las la-user-circle"></span>
            </div>
        </div>
    </div>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Recent Flights</h3>

                    <a href="{{ route('admin.flights.index') }}"><button>See all<span class="las la-arrow-right"></span></button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table	width="100%">
                            <thead>
                                <tr>
                                    <td>Flight Number</td>
                                    <td>Flight Destination</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($flight_numbers)
                                @foreach ($flight_numbers as $flights )
                                <tr>
                                    <td>{{ $flights->flight_no }}</td>
                                    <td>{{ $flights->destination }}</td>
                                    <td>
                                        @if ($flights->flight_status == 'delayed')
                                        <span class="status orange"></span>
                                        delayed
                                        @else
                                        <span class="status purple"></span>
                                        On time
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection