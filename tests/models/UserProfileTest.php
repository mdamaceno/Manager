<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

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
        $object = factory(App\UserProfile::class)->make([
          'title' => null,
        ]);

        $arrayUserProfile = $object->toArray();

        $userProfile = new App\User($arrayUserProfile);

        $this->assertFalse($userProfile->isValid());
    }

    public function test_should_not_save_without_user_id()
    {
        $userProfile = factory(App\UserProfile::class)->make([
          'user_id' => null,
        ]);

        $this->assertFalse($userProfile->isValid());
    }

    public function test_should_not_save_if_facebook_is_not_a_url()
    {
        $userProfile = factory(App\UserProfile::class)->make([
          'facebook' => 'http://facebook.com',
        ]);

        $this->assertFalse($userProfile->isValid());
    }
}
