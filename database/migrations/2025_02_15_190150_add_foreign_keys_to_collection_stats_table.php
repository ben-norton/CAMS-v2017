<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCollectionStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('collection_stats', function(Blueprint $table)
		{
			$table->foreign('collection_id')->references('id')->on('collections')->onUpdate('CASCADE')->onDelete('CASCADE');
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
		Schema::table('collection_stats', function(Blueprint $table)
		{
			$table->dropForeign('collection_stats_collection_id_foreign');
			$table->dropForeign('collection_stats_parameter_id_foreign');
		});
	}

}
