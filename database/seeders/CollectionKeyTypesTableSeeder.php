<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectionKeyTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('collection_key_types')->delete();
        
        \DB::table('collection_key_types')->insert(array (
            0 => 
            array (
                'created_at' => '2017-10-04 11:00:00',
                'data_type' => NULL,
                'definition' => NULL,
                'display_name' => 'Catalog Number',
                'format_restrictions' => NULL,
                'id' => 1,
                'remarks' => 'Standard catalog number for a collection',
                'standard_uri' => NULL,
                'updated_at' => '2017-10-04 11:00:00',
                'variable' => 'catalog_number',
            ),
            1 => 
            array (
                'created_at' => '2017-10-04 11:00:00',
                'data_type' => NULL,
                'definition' => NULL,
                'display_name' => 'Field Number',
                'format_restrictions' => NULL,
                'id' => 2,
                'remarks' => 'The field location identifier for a given collection',
                'standard_uri' => NULL,
                'updated_at' => '2017-10-04 11:00:00',
                'variable' => 'field_number',
            ),
            2 => 
            array (
                'created_at' => '2017-10-04 11:00:00',
                'data_type' => NULL,
                'definition' => NULL,
                'display_name' => 'Previous Catalog Number',
                'format_restrictions' => NULL,
                'id' => 3,
                'remarks' => 'Previous catalog number of a specimen or specimens',
                'standard_uri' => NULL,
                'updated_at' => '2017-10-04 11:00:00',
                'variable' => 'prev_catalog_number',
            ),
            3 => 
            array (
                'created_at' => '2019-11-04 00:00:00',
                'data_type' => NULL,
                'definition' => NULL,
                'display_name' => 'Object ID',
                'format_restrictions' => NULL,
                'id' => 4,
                'remarks' => 'Object numeric identifiers used in the Special Collections and Archives',
                'standard_uri' => NULL,
                'updated_at' => '2019-11-04 00:00:00',
                'variable' => 'object_id',
            ),
        ));
        
        
    }
}