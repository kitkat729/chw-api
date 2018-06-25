<?php

use Illuminate\Database\Seeder;

use App\SuppressedPhone;
//use Propaganistas\LaravelPhone\PhoneNumber;

class SuppressedPhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate and rebuild seed table
        SuppressedPhone::truncate();

        factory('App\SuppressedPhone', 50)->create();
        // for ($i = 0; $i < 50; $i++) {
        //   $sms = rand(0, 1);
        //   $voicemail = rand(0, 1);

        //   if ($sms || $voicemail) {
        //     $phone = PhoneNumber::make($faker->phoneNumber, 'US');

        //     SuppressedPhone::create([
        //       'trunk_code' => '1',
        //       'phone' => $phone,
        //       'sms' => $sms,
        //       'voicemail' => $voicemail,
        //     ]);
        //   }
        // }
    }
}
