<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => '12345678',
            'phone_number' => '0555266694',
            'balance' => 0,
            'is_admin' => 0,

        ]);
    }
}
