<?php

namespace App\Http\Controllers;

use App\Models\Flights;
use App\Http\Requests\StoreFlights;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = flights::all();
        return view('flights.viewflights',['flights'=>$flights]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flights.addflight');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlights $request)
    {
        $validatedpass = $request->validated();
        $flights = Flights::create($validatedpass);
        $request->session()->flash('success', 'Flight Created Successfully!!');
        return redirect(route('admin.flights.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flights  $flights
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\  $
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('flights.edit',
        [
            'flight' => flights::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\  $
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight = flights::find($id);
        if(!$flight){
            $request->session()->flash('error', 'flight does not exist!!');
            return redirect(route('admin.flight.index')); 
        }
        $flight->update($request->except(['_token']));
        $request->session()->flash('success', 'flight Updated Successfully!!');
        return redirect(route('admin.flights.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\  $
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Flights::destroy($id);
        $request->session()->flash('success', 'Flight Deleted Successfully!!');
        return redirect(route('admin.flights.index'));
    }

    public function search(){
        $flight_no = $_GET['flightSearch'];
        $flight = Flights::where('flight_no','LIKE', '%'.$flight_no.'%')->get();
        return view('flights.searchflight',['flights'=>$flight]);
    }
}
