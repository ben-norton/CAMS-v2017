<?php

use Database\Seeders\AssetTypesTableSeeder;
use Database\Seeders\CollectionKeyTypesTableSeeder;
use Database\Seeders\CollectionsTableSeeder;
use Database\Seeders\FileFormatsTableSeeder;
use Database\Seeders\ParameterKeysTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\RoleUserTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(CollectionKeyTypesTableSeeder::class);
        $this->call(FileFormatsTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
    }
}
