<?php

use Illuminate\Database\Seeder;
use App\task as task;


class TaskTableSeeder extends Seeder{

    public function run(){

        DB::table('tasks')->delete();

        task::create(['name'=> 'Modules', 'description' => 'User module: sign in, sign up, reset password, and change password
                        Skill module: get all in use skills, add new skill, and set skill in use.','estimateTime'=>5,'sequence'=>'1','project_id'=>2,'id'=>3] );


        task::create(['name'=> 'Modules', 'description' => 'User module: sign in, sign up, reset password, and change password
                        Skill module: get all in use skills, add new skill, and set skill in use.','estimateTime'=>5,'sequence'=>'1','project_id'=>2] );


        task::create(['name'=> 'Modules', 'description' => 'User module: sign in, sign up, reset password, and change password
                        Skill module: get all in use skills, add new skill, and set skill in use.','estimateTime'=>5,'sequence'=>'1','project_id'=>2] );

        task::create(['name'=> 'Modules', 'description' => 'User module: sign in, sign up, reset password, and change password
                        Skill module: get all in use skills, add new skill, and set skill in use.','estimateTime'=>5,'sequence'=>'1','project_id'=>2] );

        task::create(['name'=> 'Modules', 'description' => 'User module: sign in, sign up, reset password, and change password
                        Skill module: get all in use skills, add new skill, and set skill in use.','estimateTime'=>5,'sequence'=>'1','project_id'=>2] );



        DB::table('rank')->delete();
        App\rank::create(['user_id' => 1,'task_id'=>3,'skills'=>'java','overall_point' => 1000]);
    }





}

