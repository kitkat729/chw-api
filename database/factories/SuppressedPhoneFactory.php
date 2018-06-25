<?php

use Faker\Generator as Faker;
use Propaganistas\LaravelPhone\PhoneNumber;

$factory->define(App\SuppressedPhone::class, function (Faker $faker) {
    return [
      'trunk_code' => '1',
      'phone' => $faker->phoneNumber,
      'sms' => rand(0, 1),
      'voicemail' => rand(0, 1),
    ];
});
