<?php

namespace App\Http\Controllers;

use App\Models\Bag_status;
use App\Models\Flights;
use Illuminate\Http\Request;
use App\Models\Luggages;
use Illuminate\Support\Facades\DB;

class ExpectedBagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Luggages::join('passangers', 'passangers.pid','=','luggages.pid')
                        ->join('flights', 'flights.flight_no', '=','passangers.fligh_no')
                        ->get([
                            'passangers.pid','passangers.name','luggages.cardID','flights.flight_status'
                        ]);
        $data1 = Luggages::join('passangers', 'passangers.pid','=','luggages.pid')
                        ->join('bag_statuses', 'bag_statuses.bag_tagID', '=','luggages.cardID')
                        ->get([
                            'passangers.pid','passangers.name','luggages.cardID','bag_statuses.Terminal_at','passangers.fligh_no'
                        ]);
        
        $AllBags = Bag_status::all();
        $num = count($data);
        
        $flights = Flights::all();
        foreach($data1 as $d){
            if($d->Terminal_at == 'CheckIn 2'){
                return view('flights.flightStatus',['data'=>$flights, 'num'=>$num, 'dd'=>$num,'data1'=>$data1]);
            }
        }
        return view('flights.flightStatus',['data'=>$flights, 'num'=>$num, 'dd'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
