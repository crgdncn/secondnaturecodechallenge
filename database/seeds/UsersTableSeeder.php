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
        $user = new \App\Models\User();
        $user->first_name = 'Application';
        $user->last_name = 'Admin';
        $user->email = 'admin@sncc.test';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('password');
        $user->admin = true;
        $user->save();
    }
}
