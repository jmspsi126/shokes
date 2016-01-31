<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->text('name');
		});

		Schema::create('skill_user', function(Blueprint $table)
		{
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('skill_id')->unsigned();
			$table->foreign('skill_id')->references('id')->on('skills');

			$table->integer('hour');
			$table->text('level');
		});

		Schema::create('skill_task', function(Blueprint $table)
		{
			$table->timestamps();

			$table->integer('task_id')->unsigned();
			$table->foreign('task_id')->references('id')->on('tasks');

			$table->integer('skill_id')->unsigned();
			$table->foreign('skill_id')->references('id')->on('skills');

			$table->integer('hour');
			$table->text('level');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skills');


	}

}
