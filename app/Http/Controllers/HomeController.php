<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Profile;
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

  public function getListOfDonors()
  {
    $users = User::where('id', '!=', Auth::id())->paginate(5);
    return view('front.list_of_donors', ['users' => $users]);
  }

  public function fetchFindADondor(Request $request)
  {
    if(empty($request['district']) && empty($request['upazila'])){
      $profiles = Profile::where('blood_group', $request['blood_group'])
                ->where('user_id', '!=', Auth::id())
                ->paginate(5);
      ;
    }
    else if(empty($request['upazila'])){
      $profiles = Profile::where('blood_group', $request['blood_group'])
                ->where('district', $request['district'])
                ->where('user_id', '!=', Auth::id())
                ->paginate(5);
    }
    else{
      $profiles = Profile::where('blood_group', $request['blood_group'])
                ->where('district', $request['district'])
                ->where('upazila', $request['upazila'])
                ->where('user_id', '!=', Auth::id())
                ->paginate(5);
    }

    return view('front.find_a_donor_search_result', ['profiles' => $profiles]);
  }
}
