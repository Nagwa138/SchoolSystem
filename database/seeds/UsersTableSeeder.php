<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = App\User::create(
            [
                'name' => 'Super Admin',
                'email' => 'super@app.com',
                'activated' => 1,
                'password' => Hash::make(123456),
            ]
        );

        $superAdmin->attachRole('superAdmin');
    }
}
