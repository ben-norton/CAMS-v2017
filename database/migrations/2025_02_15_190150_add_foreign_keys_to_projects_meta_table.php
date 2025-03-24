<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProjectsMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects_meta', function(Blueprint $table)
		{
			$table->foreign('metakey_id')->references('id')->on('metadata_keys')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects_meta', function(Blueprint $table)
		{
			$table->dropForeign('projects_meta_metakey_id_foreign');
		});
	}

}
