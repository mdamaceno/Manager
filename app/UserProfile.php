<?php

namespace App;

class UserProfile extends BaseModel
{
    protected $fillable = [
      'firstname', 'lastname', 'gender', 'description', 'title', 'facebook',
      'twitter', 'instagram', 'linkedin', 'user_id',
    ];

    protected $rules = [
      'firstname' => 'required',
      'lastName' => 'required',
      'title' => 'required',
      'user_id' => 'required',
      'facebook' => 'url',
    ];
}
