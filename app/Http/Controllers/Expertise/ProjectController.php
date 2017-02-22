<?php

namespace App\Http\Controllers\Expertise;

use App\project;
use App\task;
use View, Input, Redirect, Session, Validator;
use App\Http\Controllers\Controller;
use App\project as ProjectModel;
use App\Company as CompanyModel;
use App\Question as QuestionModel;
use App\User as UserModel;
use App\TaskUser as TaskUserModel;
use App\UserProject as UserProjectModel;
use App\ExpertiseTask as ExpertiseTaskModel;
use App\Answer as AnswerModel;
use App\Task as TaskModel;
use App\Student;
use App\UserPivot;
use DB;

class ProjectController extends Controller { 
	

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('expertise');

	}


	public function index() {
		$user = \Auth::user()->Expertise;
		$param['pageNo'] = 1;
		
		$param['projects'] = DB::table('project')->where('status','open')->get();
		$param['mprojects'] = $user->project->unique();
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('expertise.project.index')->with($param);
	}
	
	public function view($projectId) {
		$param['pageNo'] = 1;
		$param['projectId'] = $projectId;
		$param['tasks'] = ProjectModel::find($projectId)->tasks;
		$task = ProjectModel::find($projectId)->tasks;
		$param['users'] = UserModel::get();
		// if (Session::has('alert')) {
		// 	$param['alert'] = Session::get('alert');
		// }
	

		return View::make('expertise.project.view')->with($param);
	
	}



	public function download($id){
		$task = task::find($id);
		$pathToFile= $task->submission->first()->file_path;
		return response()->download($pathToFile);
	}

	public function deny($id){
		$task = task::find($id);
		$task->submission->first()->validated-=1;
		$task->submission->first()->save();
		return Redirect::back()->with('message','Operation Successful !');
	}	

	public function validating($id){

		$task = task::find($id);
		$task->submission->first()->validated = 2;
		$task->submission->first()->save();
		$task->completed +=1;
		$task->save();


  		$user = Student::find($task->students->first()->id);
  		$user->tasks()->detach($id);



		return Redirect::back()->with('message','Operation Successful !');

	}

 	public function admin($Projectid){

        $user = \Auth::user()->expertise;

        $user->project()->attach($Projectid);
        $user->project()->state = 2;
        
        $project = project::find($Projectid);

        foreach($project->pages as $page){
	        $UserPivot = new UserPivot();
	        $UserPivot->user_id = \Auth::user()->id;
	        $UserPivot->page_id = $page->id;
	        $UserPivot->save();
    	}

        $project->status = "Ongoing";
        $project->save();

        \Session::flash('flash_message','You Admined the project successful');
        return Redirect::back();
    }

	




}
