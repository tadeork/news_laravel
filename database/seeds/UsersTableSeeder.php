<?php

use Illuminate\Database\Seeder;
use ucrnews\User;

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
            'name' => 'Tadeo',
            'email' => 'tadeoriverosk@gmail.com',
            'password' => Hash::make('Sorrentin0s'),
            'admin' => true
        ]);
    }
}
