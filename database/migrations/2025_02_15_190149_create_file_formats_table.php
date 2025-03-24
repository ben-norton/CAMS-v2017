<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFileFormatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('file_formats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('extension', 191);
			$table->string('name', 191);
			$table->string('mime_content_type', 191)->comment('MIME Type as defined by the Internet Assigned Numbers Authority. Examples: text/html, image/png');
			$table->string('description', 191)->nullable()->comment('Simple description of file format');
			$table->string('reference', 191)->nullable();
			$table->string('media_type', 191)->nullable();
			$table->text('remarks', 65535);
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
		Schema::drop('file_formats');
	}

}
