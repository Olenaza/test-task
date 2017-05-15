<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the user table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for ($i = 0; $i < 2; $i++) {
            $username = "user$i";
            $password = Hash::make("password$i");
            User::create(array(
                'username' => $username,
                'password' => $password,
                ));
        }
    }
}
