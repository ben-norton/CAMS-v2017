<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterKeysTableSeeder extends Seeder
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
                'created_at' => '2017-08-15 09:04:19',
                'display_name' => 'iDigBio',
                'id' => 1,
                'model' => 'App\\CollectionLink',
                'parameter_type' => 'link',
                'parameter_type_id' => NULL,
                'remarks' => NULL,
                'source_name' => NULL,
                'source_url' => 'https://www.idigbio.org/',
                'updated_at' => '2017-08-15 09:04:19',
                'variable' => NULL,
            ],
            [
                'created_at' => '2017-08-15 09:04:19',
                'display_name' => 'GBIF',
                'id' => 2,
                'model' => 'App\\CollectionLink',
                'parameter_type' => 'link',
                'parameter_type_id' => NULL,
                'remarks' => NULL,
                'source_name' => NULL,
                'source_url' => 'http://www.gbif.org/',
                'updated_at' => '2017-08-15 09:04:19',
                'variable' => NULL,
            ],
            [
                'created_at' => '2017-08-15 09:04:19',
                'display_name' => 'Global Registry of Biodiversity Repositories (GRBio)',
                'id' => 3,
                'model' => 'App\\CollectionLink',
                'parameter_type' => 'link',
                'parameter_type_id' => NULL,
                'remarks' => NULL,
                'source_name' => NULL,
                'source_url' => 'http://grbio.org/',
                'updated_at' => '2017-08-15 09:04:19',
                'variable' => NULL,
            ],
            [
                'created_at' => '2017-09-07 15:00:00',
                'display_name' => 'Image',
                'id' => 4,
                'model' => 'App\\AssetType',
                'parameter_type' => 'media',
                'parameter_type_id' => NULL,
                'remarks' => 'Raster images in common formats (*.jpg, *.png, *.gif)',
                'source_name' => NULL,
                'source_url' => NULL,
                'updated_at' => '2017-09-07 15:00:00',
                'variable' => 'image'
            ],
            [
                'created_at' => '2017-09-07 15:00:00',
                'display_name' => '3D Model',
                'id' => 5,
                'model' => 'App\\AssetType',
                'parameter_type' => 'media',
                'parameter_type_id' => NULL,
                'remarks' => '3D Model Meshes',
                'source_name' => NULL,
                'source_url' => NULL,
                'updated_at' => '2017-09-07 15:00:00',
                'variable' => '3d-model',
            ],
            [
                'created_at' => '2017-09-08 11:30:03',
                'display_name' => 'Number of Specimens',
                'id' => 6,
                'model' => 'App\\CollectionStat',
                'parameter_type' => 'statistic',
                'parameter_type_id' => NULL,
                'remarks' => 'Number of specimens in a collection, usually a rough estimate',
                'source_name' => NULL,
                'source_url' => NULL,
                'updated_at' => '2017-09-08 11:30:03',
                'variable' => 'number_specimens',
            ],
            [
                'created_at' => '2017-09-08 11:30:03',
                'display_name' => 'Number of Records',
                'id' => 7,
                'model' => 'App\\CollectionStat',
                'parameter_type' => 'statistic',
                'parameter_type_id' => NULL,
                'remarks' => 'Number of records in database for a given collection',
                'source_name' => NULL,
                'source_url' => NULL,
                'updated_at' => '2017-09-08 11:30:03',
                'variable' => NULL,
           ]
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('parameter_keys')->truncate();
        DB::table('parameter_keys')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        
    }
}