<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $dataTables = [
            [
                'role_id' => 2,
                'user_id' => 1,
            ],
            [
                'role_id' => 2,
                'user_id' => 2,

            ],

        ];
        DB::table('role_user')->truncate();
        DB::table("role_user")->insert($dataTables);
    }
}