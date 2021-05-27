<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=100;$i++){
            if ($i % rand(1,5) == 0){
                $message = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
            } elseif ($i % rand(3,7) > 5){
                $message ='Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident';
            } else {$message = "Тестовое сообщение в тред № $i";}
            $file = rand(1,3);
            if ($file == 1){$link = '/files/drago.jpeg';}
            elseif ($file == 2){$link = '/files/alt.jpeg';}
            elseif ($file == 3){$link = '/files/suslik.jpeg';}
            DB::table('threads')->insert([
                'desk_id' => rand(1,5),
                'user_id' => rand(1,101),
                'name'=>"Тред $i",
                'message' => $message,
                'file' => $link,
            ]);
        }
    }
}
