<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pastes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('uid');
            $table->string('problem', 5000);
            $table->string('version', 10)->default('4.0');
            $table->string('expected', 5000)->nullable();
            $table->string('actual', 5000)->nullable();
            $table->text('errors')->nullable();
			$table->timestamps();

            $table->index('user_id');
            $table->index('uid');
            $table->index('version');
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
		Schema::drop('pastes');
	}

}
