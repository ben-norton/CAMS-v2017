<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIanaTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iana_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('media_type_id')->unsigned();
			$table->string('iana_type', 191);
			$table->string('iana_subtype', 191);
			$table->string('mime', 191);
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
		Schema::drop('iana_types');
	}

}
