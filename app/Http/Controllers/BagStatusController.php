<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightStatus;
use App\Models\Bag_status;
use App\Models\FlightStatus;
use App\Models\Luggages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class BagStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Luggages::join('passangers', 'passangers.pid','=','luggages.pid')
                        ->join('bag_statuses', 'bag_statuses.bag_tagID', '=','luggages.cardID')
                        ->get([
                            'passangers.pid','passangers.name','luggages.cardID','bag_statuses.Terminal_at','bag_statuses.created_at'
                        ])->unique();
        $AllBags = Bag_status::all();
        return view('bagstatus.bagstatus',['data'=>$data]);
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
        //Validate
        $request->validate([
            'bag_tagID'=>'required',
            'Terminal_at'=> 'required',
        ]);
        $findID = DB::table('bag_statuses')->where('bag_tagID',$request->bag_tagID)->first();
        if($findID){
            if($findID->Terminal_at == 'Sort Area 2'){
                return "Bag Already at Final Sort Area";
            }
            if($request->Terminal_at == 'Sort Area 2'){
                //Get PID in Luggage table
                $getPID = DB::table('luggages')->where('cardID', $request->bag_tagID)->first();
                if(!$getPID){
                    return "Bag Not Linked to Passanger";
                }
                $getflightNo = DB::table('passangers')->where('pid', $getPID->pid)->first();
                //Get Flight number in Passengers table
                $dbData = new FlightStatus();
                $dbData->bag_tagID = $request->bag_tagID;
                $dbData->Terminal_at = $request->Terminal_at;
                $dbData->pid = $getPID->pid;
                $dbData->flight_no = $getflightNo->fligh_no;
                $checkBag = DB::table('flight_statuses')->where('pid', $getPID->pid)->first();
                if($checkBag){
                    return "Exists";
                }
                $dbData->save();
            }
        }
        
        $tag = DB::table('bag_statuses')->where('bag_tagID', $request->bag_tagID)->latest()->first();
        if($tag != null){
            if($request->Terminal_at == $tag->Terminal_at){
                return "Same Terminal";
            }
            if($tag->Terminal_at != 'Sort Area 2' || $tag->Terminal_at != 'Sort Area 1'){
                return Bag_status::create($request->all());
           }
           return $tag->bag_tagID;
        }
        return Bag_status::create($request->all());
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bag_status  $bag_status
     * @return \Illuminate\Http\Response
     */
    public function show(Bag_status $bag_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bag_status  $bag_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Bag_status $bag_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bag_status  $bag_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bag_status $bag_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bag_status  $bag_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bag_status $bag_status)
    {
        //
    }
}
