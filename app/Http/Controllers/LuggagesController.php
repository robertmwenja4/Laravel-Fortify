<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBagDetails;
use App\Models\BagID;
use App\Models\ExpectedBags;
use App\Models\Luggages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class LuggagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luggages = luggages::all();
        return view('luggages.viewluggages',['bags'=>$luggages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get the latest cardID from that table(Temp) to the view 
        $last = DB::table('bag_i_d_s')->latest()->first();
        //$last2 = DB::table('bag_i_d_s')->orderBy('id', 'DESC')->first();
        //Add other details to register the Bag 
        $read = $last->cardID;
        return view('luggages.addluggages',['user'=>$read]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBagDetails $request)
    {
        $validatedpass = $request->validated();
        $luggages = Luggages::create($validatedpass);
        $request->session()->flash('success', 'Bag Added Successfully!!');
        $pid = DB::table('passangers')->where('pid', $request->pid)->first();
        $newBag = new ExpectedBags();
        $newBag->pid = $request->pid;
        $newBag->tag_no = $request->cardID;
        if(!$pid->fligh_no){ 
            $request->session()->flash('error', 'Passenger does not Exits');
            return "Passenger does not Exits";
        }
        $newBag->flight_no = $pid->fligh_no;
        
        $checkBag = DB::table('expected_bags')->where('pid', $request->pid)->first();
        if($checkBag){
            return "Expected bag Exists";
        }
        $newBag->save();
        return redirect(route('luggages.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Luggages  $luggages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Luggages  $luggages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('luggages.edit',
        [
            'luggage' => Luggages::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Luggages  $luggages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $luggage = luggages::find($id);
        if(!$luggage){
            $request->session()->flash('error', 'luggage does not exist!!');
            return redirect(route('luggages.index')); 
        }
        $luggage->update($request->except(['_token']));
        $request->session()->flash('success', 'Bag Updated Successfully!!');
        return redirect(route('luggages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Luggages  $luggages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Luggages::destroy($id);
        $request->session()->flash('success', 'Luggage Deleted Successfully!!');
        return redirect(route('luggages.index'));
    }
    public function search($cardID, Request $request)
    {
        // Get cardId from API
        //Compare if it exist in the table Luggages
        $user = DB::table('luggages')->where('cardID', $cardID)->first();
        if($user != null){
            //Also if user exists return moble number
            $pass = DB::table('passangers')->where('pid', $user->pid)->first();
            return $pass->phone_number;
        }elseif($user == null){

            
            $users = 'Robert';
            $request = ['cardID'=>$cardID];
            $card = BagID::create($request);

            return "Creating Bag........";
        }
        //if yes -> return success -> this prompts NodeMCU to send(POST) the JSON object in Nodemcu
        //If No -> send cardID to another temporary table(Temp)
        
        
    }
    public function lookfor(){
        $tag = $_GET['bagSearch'];
        $luggage = Luggages::where('cardID','LIKE', '%'.$tag.'%')->get();
        return view('luggages.searchBag',['bags'=>$luggage]);
    }
}
