<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    ]);

    $donation = DonationHistory::create([
      'user_id' => auth()->user()->id,
      'donate_at' => $request['donate_at'],
      'details' => $request['details'],
    ]);

    return redirect()->route('add_donation')->with('success', 'Donation information added successfully');
  }

  public function getDonationHistory()
  {
    $histories = User::find(auth()->user()->id)->donation_histories->sortBy('donate_at');
    return view('donation.history', ['histories' => $histories]);
  }
}
