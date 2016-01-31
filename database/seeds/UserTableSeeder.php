<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 6/23/2015
 * Time: 12:36 PM
 */
use Illuminate\Database\Seeder;
use App\user as users;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        users::create(['id'=>1,'name' =>'Alex','email'=>'shuweiy@uci.edu','password'=>bcrypt('123456'),'isStudent'=>0,'isCompany'=>1]);

        DB::table('resume')->delete();
        App\resume::create(['studentID' => 1 ,'about' => 'hi :)','evaluation'=> 'good at java']);


    }
}