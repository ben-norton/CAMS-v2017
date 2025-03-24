<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('project_name', 191);
			$table->string('project_url', 191)->nullable();
			$table->string('contact_fname', 191)->nullable();
			$table->string('contact_lname', 191)->nullable();
			$table->string('contact_email', 191)->nullable();
			$table->string('contact_phone', 191)->nullable();
			$table->text('remarks', 65535)->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->timestamps();
			$table->string('project_shortname', 191)->nullable();
			$table->string('project_slug', 191)->nullable();
			$table->string('s3_bucket_name', 191)->nullable();
			$table->boolean('active_yn')->default(0);
			$table->boolean('public_yn')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
