<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    public function liveclass(Request $request){
        $class_id=$request->id;
        $url=Setting::select('live_url')->first()->live_url;
        return view('front.liveclass',compact('class_id'),compact('url'));
    }
    public function liveclassapp(Request $request){
        $class_id=$request->id;
        $url=Setting::select('live_url')->first()->live_url;
        return view('front.liveclassapp',compact('class_id'),compact('url'));
    }
}
