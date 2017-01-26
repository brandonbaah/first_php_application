<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->insert([
        [
           'first_name' => 'Larry',
           'last_name' => 'Moore',
           'address_1' => '2047 Phillips Rd',
           'address_2' => 'Apt. 4C',
           'city_state_zip' => 'San Francisco, CA',
           'contact_phone' => '(718) 312-3242',
           'email' => 'lmoore@email.com',
           'comp_name' => 'Loop',
           'comp_address' => '11 Park Place',
           'comp_city_state_zip' => 'New York, NY',
           'comp_phone' => '(212) 210-3822'
        ],

        [
           'first_name' => 'June',
           'last_name' => 'Ambrose',
           'address_1' => '1422 Tolliver St',
           'address_2' => 'Ste. 2399 11th Floor',
           'city_state_zip' => 'Seattle, WA',
           'contact_phone' => '(932) 312-3242',
           'email' => 'jambrose@email.com',
           'comp_name' => 'Yelp',
           'comp_address' => '232 Bitmap St',
           'comp_city_state_zip' => 'Envinmt, KY',
           'comp_phone' => '(932) 422-3822'
        ],

        [
           'first_name' => 'Dennis',
           'last_name' => 'Cruz',
           'address_1' => '95 5th St',
           'address_2' => ' 8th Floor',
           'city_state_zip' => 'Newark, NJ',
           'contact_phone' => '(321) 312-3242',
           'email' => 'dcruz@email.com',
           'comp_name' => 'Neat Bean',
           'comp_address' => '392 Hyphen St',
           'comp_city_state_zip' => 'Isals, MA',
           'comp_phone' => '(722) 422-3822'
        ]
        
     ]);
  }
}
