<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParameterKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parameter_keys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('display_name', 191);
			$table->string('variable', 191)->nullable()->comment('Variable name, possible future integration with collections data workflow');
			$table->string('model', 191)->nullable()->comment('Associated model with parameter');
			$table->string('source_name', 191)->nullable();
			$table->string('source_url', 191)->nullable();
			$table->string('parameter_type', 191)->comment('Type of parameter, vocabulary set in application configuration');
			$table->integer('parameter_type_id')->unsigned()->nullable()->comment('Placeholder for parameter_type lookup table foreign key');
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
		Schema::drop('parameter_keys');
	}

}
