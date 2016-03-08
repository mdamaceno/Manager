<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Unit tests for UserProfile.
 */
class UserProfileTest extends TestCase
{
    use DatabaseTransactions;

    public function test_should_not_save_without_firstname()
    {
        $userProfile = factory(App\UserProfile::class)->make([
          'firstname' => null,
        ]);

        $this->assertFalse($userProfile->isValid());
    }

    public function test_should_not_save_without_lastname()
    {
        $userProfile = factory(App\UserProfile::class)->make([
          'lastname' => null,
        ]);

        $this->assertFalse($userProfile->isValid());
    }

    public function test_should_not_save_without_title()
    {
        $userProfile = factory(App\UserProfile::class)->make([
          'title' => null,
        ]);

        $this->assertFalse($userProfile->isValid());
    }

    public function test_should_not_save_without_user_id()
    {
        $userProfile = factory(App\UserProfile::class)->make([
          'user_id' => null,
        ]);

        $this->assertFalse($userProfile->isValid());
    }
}
