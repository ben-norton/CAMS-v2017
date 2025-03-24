<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetTypesTableSeeder extends Seeder
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
                'created_at' => '2019-09-21 08:00:00',
                'id' => 1,
                'name' => 'Specimen Image',
                'parameter_id' => 4,
                'remarks' => 'Images of specimen(s)',
                'updated_at' => '2019-09-21 08:00:00',
            ],
            [
                'created_at' => '2019-09-21 08:00:00',
                'id' => 2,
                'name' => 'Field Location Image',
                'parameter_id' => 4,
                'remarks' => 'Images of locations in the field',
                'updated_at' => '2019-09-21 08:00:00',
            ],
            [
                'created_at' => '2019-09-21 08:00:00',
                'id' => 3,
                'name' => 'Collections Cards',
                'parameter_id' => 4,
                'remarks' => 'Images of scanned collections cards',
                'updated_at' => '2019-09-21 08:00:00',
            ],
            [
                'created_at' => '2019-09-21 08:00:00',
                'id' => 4,
                'name' => 'Field Notebook Pages',
                'parameter_id' => 4,
                'remarks' => 'Scanned images of pages in field notebooks',
                'updated_at' => '2019-09-21 08:00:00',
            ],
            [
                'created_at' => '2019-09-21 08:00:00',
                'id' => 5,
                'name' => 'Collections Ledgers',
                'parameter_id' => 4,
                'remarks' => 'Scanned images of collections ledgers',
                'updated_at' => '2017-11-02 06:53:32',
            ],
            [
                'created_at' => '2017-10-01 15:00:00',
                'id' => 6,
                'name' => '3-D Model File Set',
                'parameter_id' => 5,
                'remarks' => '3-D Model Zip Archives that contain at least the Model (obj) and Texture (png), but may also contain Material (mtl)',
                'updated_at' => '2017-10-01 15:00:00',
            ],
            [
                'created_at' => '2017-10-12 07:46:16',
                'id' => 7,
                'name' => 'Specimen Label',
                'parameter_id' => 4,
                'remarks' => 'Digitally modified picture of specimen label.',
                'updated_at' => '2017-10-12 07:46:16',
            ]
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('asset_types')->truncate();
        DB::table('asset_types')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
}