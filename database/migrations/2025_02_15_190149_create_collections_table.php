<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('collection_name', 191);
			$table->string('collection_slug', 191);
			$table->string('collection_shortname', 191)->nullable();
			$table->string('collection_code', 191)->nullable();
			$table->string('collection_manager_fname', 191)->nullable();
			$table->string('collection_manager_lname', 191)->nullable();
			$table->string('collection_manager_email', 191)->nullable();
			$table->string('collection_manager_phone', 191)->nullable();
			$table->string('curator_fname', 191)->nullable();
			$table->string('curator_lname', 191)->nullable();
			$table->string('curator_email', 191)->nullable();
			$table->string('curator_phone', 191)->nullable();
			$table->string('controller_name')->nullable();
			$table->boolean('public_gallery_yn')->default(1);
            $table->timestamps();

        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('collections');
	}

}
