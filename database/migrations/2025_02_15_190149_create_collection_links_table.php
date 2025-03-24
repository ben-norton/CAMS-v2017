<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_links', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('url', 191);
			$table->integer('parameter_id')->unsigned()->index('collection_links_parameter_id_foreign');
			$table->integer('collection_id')->unsigned()->index('collection_links_collection_id_foreign');
			$table->text('remarks', 65535)->nullable();
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
		Schema::drop('collection_links');
	}

}
