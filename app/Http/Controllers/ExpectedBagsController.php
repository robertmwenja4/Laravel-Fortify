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
        $findbags = DB::table('bag_statuses')->get();
 
            foreach ($findbags as $findbag) {
                echo $findbag->Terminal_at;
                if($findbag->Terminal_at == 'CheckIn 2'){
                    echo $findbag->bag_tagID;
                    foreach($findbag->bag_tagID as $tagID){
                        $users = DB::table('luggages')
                                        ->whereIn('cardID', [$tagID])
                                        ->get();
                        echo $users;
                    }
                    
                    // $findRelatedPid = DB::table('luggages')->get();
                    // foreach($findRelatedPid as $fPid){
                    //     echo $fPid->pid;
                    //     $findpassangers = DB::table('passangers')->get();
                    //     foreach($findpassangers as $findpass){
                    //         echo $findpass->pid;
                    //         echo "<br>";
                            
                    //     }
                    //     // if($findpassangers->pid == $fPid->pid){
                    //     //     echo $findpassangers->fligh_no;
                    //     // }
                    // }
                }
            }
        $num = count($data);
        $flights = Flights::all();
        return view('flights.flightStatus',['data'=>$flights, 'num'=>$num, 'dd'=>$users]);
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
