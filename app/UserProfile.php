<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class UserProfile extends Model
{
    use ValidatingTrait;

    protected $rules = [
      'firstname' => 'required',
      'lastName' => 'required',
      'title' => 'required',
      'user_id' => 'required',
    ];
}
