<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name'=>"Павел",
            'email' => "p4vnik@yandex.ru",
            'password' => Hash::make('1234567890'),
            'role' => 'admin'
        ]);
        for ($i=2;$i<=100;$i++){
            DB::table('users')->insert([
                'id' => $i,
                'name'=>"Пользователь $i",
                'email' => "User_$i@gmail.com",
                'password' => Hash::make('1234567890'),
            ]);
        }
    }
}
