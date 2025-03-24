<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assets', function(Blueprint $table)
		{
			$table->foreign('asset_type_id')->references('id')->on('asset_types')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('uploaded_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assets', function(Blueprint $table)
		{
			$table->dropForeign('assets_asset_type_id_foreign');
			$table->dropForeign('assets_uploaded_by_foreign');
		});
	}

}
