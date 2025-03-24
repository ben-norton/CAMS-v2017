<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects_meta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('metable_id')->unsigned()->index();
			$table->string('metable_type');
			$table->integer('metakey_id')->unsigned()->index('projects_meta_metakey_id_foreign');
			$table->string('key', 128)->index();
			$table->text('value', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects_meta');
	}

}
