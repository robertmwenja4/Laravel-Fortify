<?php

namespace App\Http\Controllers;

use App\Models\Bag_status;
use App\Models\ExpectedBags;
use App\Models\Flights;
use App\Models\FlightStatus;
use Illuminate\Http\Request;
use App\Models\Luggages;
use App\Models\Passangers;
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
    
        $total = FlightStatus::groupBy('flight_no')
                        ->selectRaw('count(*) as count, flight_no')
                        ->pluck('count', 'flight_no');
        $expectedbags = ExpectedBags::groupBy('flight_no')
                        ->selectRaw('count(*) as count, flight_no')
                        ->pluck('count', 'flight_no');
        //dd($expectedbags);

        
        $AllBags = Bag_status::all();
        $num = count($data);
        
        //Flights::where('flight_no', '')->withCount('articles')->get();
        
        $flights = Flights::all();
        foreach($data1 as $d){
            if($d->Terminal_at == 'Sort Area 2'){
                return view('flights.flightStatus',['data'=>$flights, 'num'=>$num, 'dd'=>$num,'data1'=>$data1,'total'=>$total->toArray(),'expectedBags'=>$expectedbags->toArray()]);
            }
        }
        return view('flights.flightStatus',['data'=>$flights, 'num'=>$num, 'dd'=>$num,'total'=>$total->toArray(),'expectedBags'=>$expectedbags->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bags = Luggages::all();
        foreach($bags as $bag){
            $bag->pid;
            $passangers = Passangers::find($bag->pid);
            foreach($passangers as $passanger){
                $passanger->fligh_no;
                $dupe_array = array();
                foreach ($passanger->fligh_no as $val) {
                    if (++$dupe_array[$val] > 1) {
                        dd(count($val));
                        return true;
                    }
                }
                return false;
            }
        }
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
