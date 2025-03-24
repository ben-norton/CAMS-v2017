<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCollectionKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('collection_keys', function(Blueprint $table)
		{
			$table->foreign('asset_id')->references('id')->on('assets')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('collection_id')->references('id')->on('collections')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('key_type_id')->references('id')->on('collection_key_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('collection_keys', function(Blueprint $table)
		{
			$table->dropForeign('collection_keys_asset_id_foreign');
			$table->dropForeign('collection_keys_collection_id_foreign');
			$table->dropForeign('collection_keys_key_type_id_foreign');
		});
	}

}
