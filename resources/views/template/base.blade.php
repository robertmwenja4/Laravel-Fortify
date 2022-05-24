<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'User Management System') }}</title>

        {{-- Style --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="lab la-accusoft"></span><span>Airport</span></h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard.index') }}" class="active"><span class="las la-igloo"></span>
                            <span>Dashboard</span></a>
                        
                    </li>
                    <li>
                        @can('is-admin')
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Users
                            </button>
                            <div class="dropdown-menu" style="background-color: #000" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.users.index') }}">View Users</a>
                              <a class="dropdown-item" href="{{ route('admin.users.create') }}">Add New User</a>
                            </div>
                          </div>
                        @endcan
                        
                    </li>
                    <li>
                        @can('is-all')
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Passengers
                            </button>
                            <div class="dropdown-menu" style="background-color: #000" aria-labelledby="dropdownMenuButton">
                              @cannot('is-boardonly')
                              <a class="dropdown-item" href="{{ route('admin.passanger.index') }}">View Passengers</a>
                              <a class="dropdown-item" href="{{ route('admin.passanger.create') }}">Add New Passenger</a>
                              @endcannot
                              @cannot('is-check')
                              <a class="dropdown-item" href="{{ route('admin.passanger.index') }}">Checkin</a>
                              @endcannot
                              
                            </div>
                          </div>
                        @endcan
                        
                    </li>
                    <li>
                        @can('is-admin')
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Flights
                            </button>
                            <div class="dropdown-menu" style="background-color: #000" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.flights.index') }}">View Flights</a>
                              <a class="dropdown-item" href="{{ route('admin.flights.create') }}">Add New Flight</a>
                              <a class="dropdown-item" href="{{ route('admin.expected.index') }}">Flight Status</a>
                            </div>
                          </div>
                        @endcan
                        
                    </li>
                    <li>
                        @can('is-admin_Checkin_Agent')
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Baggages
                            </button>
                            <div class="dropdown-menu" style="background-color: #000" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('luggages.index') }}">View Baggages</a>
                              <a class="dropdown-item" href="{{ route('luggages.create') }}">Add New Baggage</a>
                              @cannot('is-check')
                              <a class="dropdown-item" href="{{ route('admin.status.index') }}">Bag Status</a>
                              @endcannot
                              
                            </div>
                          </div>
                        @endcan
                        
                    </li>
                    <li>
                        @can('is-all')
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Passanger & Bags
                            </button>
                            <div class="dropdown-menu" style="background-color: #000" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.passbagstatus.index') }}">View Passanger & Bags</a>
                            </div>
                          </div>
                        @endcan
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-content">
            <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    <span class="navbar-brand">{{ "TRIPPLE A" }}</span>
                    {{-- <a class="navbar-brand" href="#">{{ "Luggage Tracking System" }}</a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </h2>
                <div class="form-inline my-2 my-lg-0" >
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <a href="{{ route('user.profile') }}"><span>Profile</span></a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            @else
                                <a id="log" href="{{ route('login') }}">Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </header>
            <main class="container">
                @include('partials.alerts')
                @yield('content')
            </main>
        </div>
    </body>
</html>
