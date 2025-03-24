<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_stats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('value_dec', 14, 4)->nullable();
			$table->bigInteger('value_int')->nullable();
			$table->string('value_str', 191)->nullable();
			$table->string('frequency', 191)->nullable();
			$table->integer('stat_day')->nullable();
			$table->integer('stat_month')->nullable();
			$table->integer('stat_year')->nullable();
			$table->string('source', 191)->nullable();
			$table->text('remarks', 65535)->nullable();
			$table->integer('collection_id')->unsigned()->index('collection_stats_collection_id_foreign');
			$table->timestamps();
			$table->integer('parameter_id')->unsigned()->index('collection_stats_parameter_id_foreign');
			$table->string('external_link', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('collection_stats');
	}

}
