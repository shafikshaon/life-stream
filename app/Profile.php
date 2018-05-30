<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
    'phone_number', 'blood_group', 'weight', 'upazila', 'district', 'img_path', 'blood_group', 'is_show_phone_number', 'is_show_email',
  ];
}
