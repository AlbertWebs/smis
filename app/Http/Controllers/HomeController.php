<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        $Available = DB::table('organizations')->where('user_id',Auth::User()->id)->get();
        // dd($Available);
        if($Available->isEmpty()){
            return view('front.index');
        }else{
            return view('front.dashboard');
        }
    }

    public function dashboard()
    {
        return view('front.dashboard');
    }
}
