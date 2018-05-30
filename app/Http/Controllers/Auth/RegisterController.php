<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'full_name' => 'required|string|max:100',
      'username' => 'required|string|max:30|unique:users',
      'email' => 'required|string|email|max:100|unique:users',
      'password' => 'required|string|min:6|max:100|confirmed',
      'phone_number' => 'required|string|max:11|unique:profiles',
      'gender' => 'required|string|max:12',
      'blood_group' => 'required|string|max:3',
      'district' => 'required|string|max:2',
      'upazila' => 'required|string|max:3',
      'signup_agreement' => 'accepted',
    ],[
      'phone_number.required' =>"Phone number is required",
      'phone_number.max' =>"Phone number is not longer than 11 characters",
      'phone_number.unique' =>"Phone number already exists",
      'district.max' =>"Please select district correctly",
      'district.required' =>"District is required",
      'district.max' =>"Please select district correctly",
      'upazila.required' =>"Upazila is required",
      'upazila.max' =>"Please select upazila correctly",
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  public function getDistricts()
  {
    $districts = DB::table('districts')->pluck("district_name", "id")->sort();
    return view('auth.register', ['districts' => $districts]);
  }

  public function getUpazilas($id)
  {
    $upazilas = DB::table("upazilas")->where("district_id", $id)->pluck("upazila_name", "id")->sort();
    return json_encode($upazilas);
  }
}
