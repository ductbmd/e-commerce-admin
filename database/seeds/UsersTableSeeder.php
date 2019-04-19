<?php

use Illuminate\Database\Seeder;
use Laraspace\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'duc.tbmd@gmail.com',
            'name' => 'Minh Duc',
            'role' => 'admin',
            'password' => bcrypt('admin@123')
        ]);

        User::create([
            'email' => 'so1@gmail.com',
            'name' => 'User1',
            'role' => 'user',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'email' => 'user2@gmail.com',
            'name' => 'User2 ',
            'role' => 'user',
            'password' => bcrypt('123456')
        ]);
    }
}
