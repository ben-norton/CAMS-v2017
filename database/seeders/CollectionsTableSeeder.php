<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
      $data = [
          [
            'collection_code' => 'IZ',
            'collection_manager_email' => null,
            'collection_manager_fname' => null,
            'collection_manager_lname' => null,
            'collection_manager_phone' => null,
            'collection_name' => 'Invertebrate Zoology',
            'collection_shortname' => 'IZ',
            'collection_slug' => 'invertebrate-zoology',
            'controller_name' => null,
            'created_at' => Carbon::now(),
            'curator_email' => null,
            'curator_fname' => 'The',
            'curator_lname' => 'Curator',
            'curator_phone' => NULL,
            'id' => 1,
            'public_gallery_yn' => 1,
            'updated_at' => Carbon::now()
          ],
      ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('collections')->truncate();
        DB::table('collections')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
}
