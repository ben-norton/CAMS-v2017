<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $data = [
            0 => 
            array (
                'created_at' => '2017-09-19 18:31:56',
                'email' => 'demo@demo.com',
                'fname' => 'The',
                'id' => 1,
                'lname' => 'Administrator',
                'password' => bcrypt('password'),
                'updated_at' => '2017-09-19 18:31:56'
            ),
            1 =>
            array (
                'created_at' => '2017-09-19 18:31:56',
                'email' => 'user@user.com',
                'fname' => 'The',
                'id' => 2,
                'lname' => 'User',
                'password' => bcrypt('password'),
                'updated_at' => '2017-09-19 18:31:56'
            )
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table("users")->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        
    }
}
