<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->string('status');
            $table->text('description');
            $table->text('skills');
			$table->text('environment');
			$table->timestamps();

			$table->dateTime('start_time');
			$table->dateTime('end_time');


			$table->String("difficulty");

			$table->Integer('company_id')->unsigned();

		});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('project');
	}

}
