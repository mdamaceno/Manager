<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\User;

/**
 * Controller for User.
 */
class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return $users;
    }

    public function show($id)
    {
        $user = User::find($id);

        return $user;
    }
}
