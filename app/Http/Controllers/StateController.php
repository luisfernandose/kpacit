<?php

namespace App\Http\Controllers;

use App\State;
use App\Allcountry;
use Illuminate\Http\Request;
use Session;
use App\Country;
use App\Allstate;
use DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        return view('admin.country.state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $country = Country::all();
        return view("admin.country.state.add",compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $data = Country::where('id', $request->country_id)->first();

      $allstates = Allstate::where('country_id', $data->country_id)->get();

      //add if state is not added
      $states = State::where('country_id', $data->country_id)->first();

        if($states == NULL){

          foreach($allstates as $state)
          { 

            DB::table('states')->insert(
                  array(
                      'state_id'  => $state->id,
                      'name'      => $state->name,
                      'country_id'=> $state->country_id,
                  )
              );
          }

          session()->flash("success","State Has Been Added !");

        }
        else{

            session()->flash("delete","State Already Exist !");
        }


      
        return redirect('admin/state');

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $states = State::findorfail($id);
      return view('admin.country.state.edit')->withStates($states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $this->validate($request, array(

        's_name' => 'required:states,state'

      ));

      $state = State::findorfail($id);

      $state->state = $request->s_name;
      $state->save();

      Session::flash('success','State Name Changed Successfully !');
      return redirect()->route('state.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $state = State::find($id);
      $state->delete();
      Session::flash('success','State Deleted Successfully !');
      return redirect('admin/state');
    }
}
