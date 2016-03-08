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

        $this->get('/api/v1/users')->seeJsonEquals([
          'type' => 'users',
          'data' => $users->toArray(),
        ]);
    }

    public function test_returns_a_single_user()
    {
        $user = factory(App\User::class)->create();

        $this->get('/api/v1/users/'.$user->id)->seeJsonEquals([
          'type' => 'users',
          'data' => $user->toArray(),
        ]);
    }

    public function test_creates_a_new_user()
    {
        $this->post('/api/v1/users', [
          'username' => 'admin',
          'email' => 'admin@admin.com',
          'password' => '123456',
        ])->seeJson([
          'username' => 'admin',
          'email' => 'admin@admin.com',
        ]);

        $this->assertResponseStatus(201);
    }

    public function test_updates_a_user()
    {
        $user = factory(App\User::class)->create();

        $this->patch('/api/v1/users/'.$user->id, [
          'username' => 'administrator',
          'email' => 'administrator@admin.com',
        ])
        ->seeJson([
          'username' => 'administrator',
          'email' => 'administrator@admin.com',
        ]);

        $this->assertResponseStatus(200);
    }

    public function test_removes_a_user()
    {
        $user = factory(App\User::class)->create([
          'username' => 'admin',
        ]);

        $this->delete('/api/v1/users/'.$user->id);

        $this->notSeeInDatabase('users', [
          'username' => 'admin',
        ]);

        $this->assertResponseStatus(204);
    }
}
