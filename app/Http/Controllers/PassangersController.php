<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePassangerData;
use App\Models\Flights;
use App\Models\Passangers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PassangersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passangers = Passangers::all();
        return view('passanger.viewpassanger',['passangers'=>$passangers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passanger.addpassanger');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePassangerData $request)
    {
        $validatedpass = $request->validated();
        $passanger = Passangers::create($validatedpass);
        $request->session()->flash('success', 'Passanger Created Successfully!!');
        return redirect(route('admin.passanger.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passangers  $passangers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passangers  $passangers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('passanger.edit',
        [
            'passanger' => Passangers::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Passangers  $passangers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $passanger = Passangers::find($id);
        if(!$passanger){
            $request->session()->flash('error', 'Passanger does not exist!!');
            return redirect(route('admin.passanger.index')); 
        }

        $passanger->update($request->except(['_token']));
        $request->session()->flash('success', 'Passanger Updated Successfully!!');
        return redirect(route('admin.passanger.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passangers  $passangers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Passangers::destroy($id);
        $request->session()->flash('success', 'Passanger Deleted Successfully!!');
        return redirect(route('admin.passanger.index'));
    }
    
}