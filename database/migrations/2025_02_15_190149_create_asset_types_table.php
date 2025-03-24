<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asset_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->text('remarks', 65535)->nullable();
			$table->timestamps();
			$table->integer('parameter_id')->unsigned()->index('asset_types_parameter_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('asset_types');
	}

}
