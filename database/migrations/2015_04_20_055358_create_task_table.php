<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps('start_time');
            $table->string('name');
            $table->text('description');
            $table->integer('estimateTime');

            $table->integer("sequence");

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');

			$table->integer('company')->unsigned();
			$table->foreign('company_id')->references('id')->on('company');
		});


		Schema::create('task_student', function(Blueprint $table)
		{
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('student');

			$table->integer('task_id')->unsigned()->index();
			$table->foreign('task_id')->references('id')->on('tasks');

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
		Schema::dropIfExists('tasks');
		Schema::drop('user_task');
	}

}
