<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //check if setup is complete
        $Available = DB::table('organizations')->where('user_id',Auth::User()->id)->get();
        if($Available->isEmpty()){
            return view('front.index');
        }else{
            return view('front.dashboard');
        }
    }
}
