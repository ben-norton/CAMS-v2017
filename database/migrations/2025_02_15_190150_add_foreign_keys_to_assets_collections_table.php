<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssetsCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assets_collections', function(Blueprint $table)
		{
			$table->foreign('asset_id')->references('id')->on('assets')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('collection_id')->references('id')->on('collections')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assets_collections', function(Blueprint $table)
		{
			$table->dropForeign('assets_collections_asset_id_foreign');
			$table->dropForeign('assets_collections_collection_id_foreign');
		});
	}

}
