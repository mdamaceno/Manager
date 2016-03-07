<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ModelValidation;

class User extends Authenticatable
{
    use ModelValidation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rules = [
      'email' => 'required',
      'username' => 'required',
      'password' => 'required',
    ];
}
