<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 *	Tests for UsersController.
 */
class UsersControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function test_returns_all_users()
    {
        $users = factory(App\User::class, 10)->create();

        $this->get('/api/v1/users')->seeJsonEquals($users->toArray());
    }

    public function test_returns_a_single_user()
    {
        $user = factory(App\User::class)->create();

        $this->get('/api/v1/users/'.$user->id)->seeJsonEquals($user->toArray());
    }
}
