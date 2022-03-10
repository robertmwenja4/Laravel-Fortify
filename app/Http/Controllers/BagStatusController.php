<?php

namespace App\Http\Controllers;

use App\Models\Bag_status;
use App\Models\Luggages;
use Illuminate\Http\Request;

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
                            'passangers.pid','passangers.name','luggages.cardID','bag_statuses.Terminal_at'
                        ]);
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
