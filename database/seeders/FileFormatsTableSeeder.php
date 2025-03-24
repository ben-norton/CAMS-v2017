<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FileFormatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('file_formats')->delete();
        
        \DB::table('file_formats')->insert(array (
            0 => 
            array (
                'created_at' => '2022-06-08 11:11:34',
                'description' => NULL,
                'extension' => 'png',
                'id' => 1,
                'media_type' => 'image',
                'mime_content_type' => 'image/png',
                'name' => 'Portable Network Graphics',
                'reference' => 'https://www.iana.org/assignments/media-types/image/png',
                'remarks' => 'PNG Files',
                'updated_at' => '2022-06-08 11:11:34',
            ),
            1 => 
            array (
                'created_at' => '2022-06-08 11:11:34',
                'description' => NULL,
                'extension' => 'jpg',
                'id' => 2,
                'media_type' => 'image',
                'mime_content_type' => 'image/jpeg',
            'name' => 'Joint Photographic Expert Group image (JPEG)',
                'reference' => 'https://www.w3.org/Graphics/JPEG/',
                'remarks' => 'JPG Files',
                'updated_at' => '2022-06-08 11:11:34',
            ),
            2 => 
            array (
                'created_at' => '2022-06-08 11:11:34',
                'description' => NULL,
                'extension' => 'tif',
                'id' => 3,
                'media_type' => 'image',
                'mime_content_type' => 'image/tiff',
                'name' => 'Tagged Image File Format',
                'reference' => 'https://www.iana.org/assignments/media-types/image/tiff',
                'remarks' => 'Lossless TIF images',
                'updated_at' => '2022-06-08 11:11:34',
            ),
            3 => 
            array (
                'created_at' => '2022-06-08 11:11:34',
                'description' => NULL,
                'extension' => 'pdf',
                'id' => 4,
                'media_type' => 'document',
                'mime_content_type' => 'application/pdf',
                'name' => 'Adobe Portable Document Format',
                'reference' => 'https://www.iana.org/assignments/media-types/application/pdf',
                'remarks' => 'PDFs belong to the application IANA registry',
                'updated_at' => '2022-06-08 11:11:34',
            ),
        ));
        
        
    }
}