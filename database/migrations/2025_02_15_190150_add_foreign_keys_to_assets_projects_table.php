<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssetsProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assets_projects', function(Blueprint $table)
		{
			$table->foreign('asset_id', 'asset_project_asset_id_foreign')->references('id')->on('assets')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('project_id', 'asset_project_project_id_foreign')->references('id')->on('projects')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assets_projects', function(Blueprint $table)
		{
			$table->dropForeign('asset_project_asset_id_foreign');
			$table->dropForeign('asset_project_project_id_foreign');
		});
	}

}
