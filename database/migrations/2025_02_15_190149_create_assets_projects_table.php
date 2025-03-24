<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets_projects', function(Blueprint $table)
		{
			$table->integer('asset_id')->unsigned()->index('asset_project_asset_id_index');
			$table->integer('project_id')->unsigned()->index('asset_project_project_id_index');
			$table->text('remarks', 65535)->nullable();
			$table->timestamps();
			$table->primary(['asset_id','project_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assets_projects');
	}

}
