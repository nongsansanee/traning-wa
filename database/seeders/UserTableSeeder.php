<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $password = Hash::make('11111111');
        $users = array(
            ['name'=>'peter','email'=>'peter.p@gmail.com','password'=>$password],
            ['name'=>'julee','email'=>'julee.j@gmail.com','password'=>$password],
        );
        
        foreach($users as $user){
            User::create($user);
        }
    }
}
