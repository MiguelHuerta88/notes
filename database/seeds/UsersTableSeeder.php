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
        // seed a few users to our table
        DB::table('users')->insert(
            [
                'email' => 'guelme88@gmail.com',
                'password' => bcrypt('miguel88'),
                'created_at' => '2017-04-06 12:15:00'
            ]
        );

        // insert another test user
        DB::table('users')->insert(
            [
                'email' => 'susie_greco@yahoo.com',
                'password' => bcrypt('Mickey1986'),
                'created_at' => '2017-04-06 12:15:00'
            ]
        );
    }
}
