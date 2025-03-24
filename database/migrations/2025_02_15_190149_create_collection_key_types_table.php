<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionKeyTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_key_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('variable', 191);
			$table->string('display_name', 191);
			$table->text('remarks', 65535)->nullable();
			$table->timestamps();
			$table->text('definition', 65535)->nullable();
			$table->string('format_restrictions', 191)->nullable();
			$table->string('data_type', 191)->nullable();
			$table->string('standard_uri', 191)->nullable()->comment('URI to standardized form of the key type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('collection_key_types');
	}

}
