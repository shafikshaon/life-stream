<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('front.home');
    }

    public function getDistricts()
    {
      $districts = DB::table('districts')->pluck("district_name", "id")->sort();
      return view('front.home', ['districts' => $districts]);
    }
}
