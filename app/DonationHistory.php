<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationHistory extends Model
{
  protected $fillable = [
    'user_id', 'donate_at', 'details',
  ];
}
