<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_keys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key_value', 191);
			$table->integer('key_type_id')->unsigned()->index('collection_keys_key_type_id_foreign');
			$table->integer('asset_id')->unsigned()->index('collection_keys_asset_id_foreign');
			$table->integer('collection_id')->unsigned()->index('collection_keys_collection_id_foreign');
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
		Schema::drop('collection_keys');
	}

}
