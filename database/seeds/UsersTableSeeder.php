<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([

               [
                   'name' => 'Jimmy',
                   'email' => 'jimmy@app.com',
                   'password' => bcrypt('password'),
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'Lianna',
                   'email' => 'lianna@app.com',
                   'password' => bcrypt('password'),
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ],
               [
                   'name' => 'Dora',
                   'email' => 'dora@app.com',
                   'password' => bcrypt('password'),
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ]

           ]);

    }
}
