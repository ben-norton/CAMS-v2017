<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('guid', 36)->nullable();
			$table->string('title', 191)->nullable();
			$table->text('remarks', 65535)->nullable();
			$table->text('source', 65535)->nullable();
			$table->integer('uploaded_by')->unsigned()->index('assets_uploaded_by_foreign');
			$table->integer('asset_type_id')->unsigned()->index('assets_asset_type_id_foreign');
			$table->string('s3filename', 191)->nullable();
			$table->string('s3path', 191)->nullable();
			$table->string('imgname_lg', 191)->nullable();
			$table->string('imgpath_lg', 191)->nullable();
			$table->string('imgname_md', 191)->nullable();
			$table->string('imgpath_md', 191)->nullable();
			$table->string('imgname_thumb', 191)->nullable();
			$table->string('imgpath_thumb', 191)->nullable();
			$table->string('original_filename', 191);
			$table->boolean('public_yn')->default(1);
			$table->timestamps();
			$table->boolean('attribution_required_yn')->default(0);
			$table->string('attribution', 191)->nullable();
			$table->boolean('usage_restrictions_yn')->default(0);
			$table->string('license_type', 191)->nullable();
			$table->text('restriction_remarks', 65535)->nullable();
			$table->boolean('archive_yn')->nullable()->default(0);
			$table->integer('file_format_id')->unsigned()->default(1);
			$table->string('media_type', 191)->default('image');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assets');
	}

}
