<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  protected $fillable = [
    'upazila_name',
  ];

  public function upazila()
  {
    return $this->hasMany('App\Upazila');
  }
}
