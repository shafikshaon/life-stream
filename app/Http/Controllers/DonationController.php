<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonationHistory;

class DonationController extends Controller
{
  public function getAddDonation()
  {
    return view('donation.add');
  }

  public function postAddDonation(Request $request)
  {
    $this->validate($request, [
      'donate_at' => 'required|string|max:10',
      'details' => 'max:1000',
    ],[
      'donate_at.required' =>"Donation date is required",
      'donate_at.max' =>"Donation date is not correct format. Format is yyyy-mm-dd",
      'details.max' =>"Details is not longer that 1000 characters",
    ]);

    $donation = DonationHistory::create([
      'user_id' => auth()->user()->id,
      'donate_at' => $request['donate_at'],
      'details' => $request['details'],
    ]);

    return redirect()->route('add_donation')->with('success', 'Donation information added successfully');
  }
}
