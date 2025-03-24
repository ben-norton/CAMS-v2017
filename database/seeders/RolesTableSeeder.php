<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'created_at' => '2017-09-20 16:00:00',
                'description' => 'Default Role',
                'display_name' => 'User',
                'id' => 1,
                'name' => 'user',
                'updated_at' => '2017-09-20 16:00:00',
            ),
            1 => 
            array (
                'created_at' => '2017-09-20 16:00:00',
                'description' => 'The Administrators',
                'display_name' => 'Administrator',
                'id' => 2,
                'name' => 'administrator',
                'updated_at' => '2017-09-20 16:00:00',
            ),
            2 => 
            array (
                'created_at' => '2017-09-20 16:00:00',
                'description' => 'Museum staff',
                'display_name' => 'Staff',
                'id' => 3,
                'name' => 'staff',
                'updated_at' => '2017-09-20 16:00:00',
            ),
            3 => 
            array (
                'created_at' => '2019-09-17 00:00:00',
                'description' => 'Users that no longer have access, but their historical activity can be preserved in the system.',
                'display_name' => 'Past Contributors',
                'id' => 4,
                'name' => 'past',
                'updated_at' => '2019-09-17 00:00:00',
            ),
        ));
        
        
    }
}