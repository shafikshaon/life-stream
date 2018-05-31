<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function getProfile()
  {
    $user = User::find(auth()->user()->id);
    $profile = User::find(auth()->user()->id)->profile;
    return view('profile.profile', ['user' => $user, 'profile' => $profile]);
  }
}
