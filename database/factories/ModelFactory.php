<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstNameMale,
        'lastname' => $faker->lastName,
        'description' => $faker->text,
        'gender' => 'male',
        'title' => $faker->title('male'),
        'facebook' => 'https://facebook.com/'.$faker->userName,
        'twitter' => 'https://twitter.com/'.$faker->userName,
        'instagram' => 'https://instagram.com/'.$faker->userName,
        'linkedin' => 'https://br.linkedin.com/'.$faker->userName,
        'user_id' => function () {
          return factory(App\User::class)->create()->id;
        },
    ];
});
