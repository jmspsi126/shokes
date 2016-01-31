<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('submission', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer("project_id")->unsigned();
            $table->foreign('project_id')->references('id')->on('project');


            $table->integer("team_id")->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');

            $table->string("file_path");


        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission');
    }

}
