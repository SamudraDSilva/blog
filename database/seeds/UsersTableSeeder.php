<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user1 = User::where('email','mario@gmail.com')->first();
        $user2 = User::where('email','blade@gmail.com')->first();

        if(!$user1){

            User::create([
                'name'=>'Mario',
                'email'=>'mario@gmail.com',
                'password'=> Hash::make('password'),
                'role'=>'admin'
            ]);
        }

        if(!$user2){

            User::create([
                'name'=>'blade',
                'email'=>'blade@gmail.com',
                'password'=> Hash::make('password'),
                'role'=>'author'
            ]);
        }
            
        
    }
}
