<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\District;
use App\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

  public function getChangePassword()
  {
    $user = User::find(auth()->user()->id);
    return view('profile.change_password', ['user' => $user]);
  }

  public function postChangePassword(Request $request)
  {
    $this->validate($request, [
      'new_password' => 'required|string|min:8|max:100|required_with:confirm_new_password|same:confirm_new_password',
    ]);
    $currentPassword = User::where('password', $request['current_password']);
    if(!$currentPassword){
      return redirect()->route('change_password')->with('failed', 'Current password is wrong');
    }
    $user = User::where('id', auth()->user()->id)->update([
      'password' => Hash::make($request['new_password']),
    ]);

    return redirect()->route('change_password')->with('success', 'Password updated successfully');
  }

  public function getUploadProfilePicture()
  {
    $profile = User::find(auth()->user()->id)->profile;
    return view('profile.upload_profile_picture', ['profile' => $profile]);
  }

  public function postUploadProfilePicture(Request $request)
  {
    $file_name = time().$_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];

    if(empty($errors)==true){
      move_uploaded_file($file_tmp,base_path()."/public/uploads/".$file_name);
    }

    $profile = Profile::where('user_id', auth()->user()->id)->update([
      'img_path' => $file_name,
    ]);
    return redirect()->route('upload_profile_picture')->with('success', 'Profile picture uploaded successfully');
  }
}
