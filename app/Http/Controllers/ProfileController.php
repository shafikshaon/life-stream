<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\District;
use App\Upazila;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function getProfile()
  {
    $user = User::find(auth()->user()->id);
    $profile = User::find(auth()->user()->id)->profile;
    return view('profile.profile', ['user' => $user, 'profile' => $profile]);
  }

  public function getProfileDetails()
  {
    $user = User::find(auth()->user()->id);
    $profile = User::find(auth()->user()->id)->profile;
    $district = District::find($profile->district);
    $upazila = Upazila::find($profile->upazila);
    return view('profile.profile_details', ['user' => $user, 'profile' => $profile, 'district' => $district, 'upazila' => $upazila]);
  }
}
