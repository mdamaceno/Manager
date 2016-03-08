<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

/**
 * Controller for User.
 */
class UsersController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        return response()->json([
          'type' => 'users',
          'data' => $users,
        ]);
    }

    public function show($id)
    {
        $user = $this->user->find($id);

        if ($user) {
            return response()->json([
              'type' => 'users',
              'data' => $user,
            ]);
        } else {
            return response()->json([
              'type' => 'error',
              'data' => 'User not found',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $user = new User($request->all());

        if ($user->save()) {
            return response()->json([
              'type' => 'users',
              'data' => $user,
            ], 201);
        } else {
            return response()->json([
              'type' => 'error',
              'data' => $user->getErrors(),
            ], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->find($id);

        if ($user->update($request->all())) {
            return response()->json([
              'type' => 'users',
              'data' => $user,
            ], 200);
        } else {
            return response()->json([
              'type' => 'error',
              'data' => $user->getErrors(),
            ], 422);
        }
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);

        if ($user) {
            $this->user->destroy($user->id);

            return response()->json(null, 204);
        } else {
            return response()->json([
              'type' => 'error',
              'data' => 'User not found',
            ], 404);
        }
    }
}
