<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');
//      $results = DB::select('select * from users where id = ?', [1]);        
//      var_dump($results);
DB::table('users')->truncate();
        
        DB::table('users')->insert([
            ['name'=>'user1','email'=>'user1@gmail.com','password'=>'123456'],
            ['name'=>'user2','email'=>'user2@gmail.com','password'=>'123456'],
            ['name'=>'user3','email'=>'user3@gmail.com','password'=>'123456'],
        ]);
    }
}
