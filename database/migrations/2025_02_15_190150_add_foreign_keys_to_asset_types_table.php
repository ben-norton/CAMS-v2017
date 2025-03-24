<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssetTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('asset_types', function(Blueprint $table)
		{
			$table->foreign('parameter_id')->references('id')->on('parameter_keys')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('asset_types', function(Blueprint $table)
		{
			$table->dropForeign('asset_types_parameter_id_foreign');
		});
	}

}
