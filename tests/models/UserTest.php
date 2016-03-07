<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_should_not_save_without_email()
    {
        $user = factory(App\User::class)->make([
          'email' => null,
        ]);

        $this->assertFalse($user->isValid());
    }

    public function test_should_not_save_without_username()
    {
        $user = factory(App\User::class)->make([
          'username' => null,
        ]);

        $this->assertFalse($user->isValid());
    }

    public function test_should_not_save_without_password()
    {
        $user = factory(App\User::class)->make([
          'password' => null,
        ]);

        $this->assertFalse($user->isValid());
    }
}
