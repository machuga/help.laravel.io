<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('paste_id')->unsigned()->nullable();
			$table->integer('name')->nullable();
			$table->string('file_type', 50)->default('php');
			$table->text('code');
			$table->timestamps();

            $table->index('paste_id');
            $table->index('file_type');
            $table->index('created_at');
            $table->index('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files');
	}

}
