<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('studentID')->unsigned();
            $table->foreign('studentID')->references('id')->on('users');
            
            $table->integer('Javascript')->default(0);
            $table->integer('java')->default(0);
            $table->integer('Html')->default(0);
            $table->integer('Mysql')->default(0);
            $table->integer('Cpp')->default(0);
            $table->integer('Python')->default(0);
            $table->integer('Ruby')->default(0);
            
            $table->text("about");
            
            
            $table->integer('communication')->default(0);
            $table->integer('codingAbility')->default(0);
            $table->integer('learningAblity')->default(0);
            
            
            $table->text('evaluation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume');
    }
}
