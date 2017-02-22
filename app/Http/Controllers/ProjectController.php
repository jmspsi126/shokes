<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\project;
use App\task;
use App\User;
use App\TaskUser;
use App\submission;
use App\GithubWorkHistory as GithubWorkHistoryModel;
use App\Github as GithubModel;
use Input;
use Request;
use Session;
use Redirect;
use Validator;
use Vinkla\GitLab\Facades\GitLab;
use flash;
use DB;
use Mail, SSH;
use Illuminate\Routing\Route;


class ProjectController extends Controller
{
    public function __construct(Route $route){
        $this->middleware('auth', ['except' => ['approve','reject']]);
		$currAction = explode('@',$route->getActionName());
		if(!(isset($currAction[1]) && in_array($currAction[1],array('approve','reject')))){
			$this->middleware('student');
		}
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $student = \Auth::user()->Student;
        $collection = collect();
        $tasks = task::all();
        
        return view('project.test',compact('tasks','student'));
    }

    //to get frelancer page data from ajax
    public function get_projects(){

        $projects = project::latest()->get();

        $student = \Auth::user()->Student;

        $collection = collect();
        $tasks = task::all();
        $results = "";
        foreach ($tasks as $task) {
            $match = 0;
            foreach ($task->skill()->get() as $skill) {
                if ($student->user()->get()->first()->skill()->get()->contains($skill->id)) {
                    $match++;
                    //dd($task);
                }
            }
            if($task->skill()->count()!=0){
            $match /= $task->skill()->count();}
            else{
             $match = 0;   
            }
            //$match = round($match);
            $task->setMatch($match);
            $collection->push($task);
            $results = $results . $task->id . $task->skill()->get() . " \n";
        }
        $tasks = $collection->sortByDesc(function ($task, $key) {
                            $match = $task->getMatch();
                            //$task->setMatch((string) $match . "%");
                            return $match;
                            });

        //$tasks = task::all()->where('status','=','0');// = not working on server
        // $tasks = task::all()->where('status',0);
      
        return view('project.freelancer',compact('tasks'));

    }

    public function getAjax($Projectid){

        $id = Input::get("id");
        $user = \Auth::user()->student;
        if($user->tasks->contains($id)){
            \Session::flash('flash_message','You have already joined this task');
            return "fail";
        }

        $user->tasks()->attach($id);
        
        $task = task::find($id);

        $task->status = 1;
        $task->save();

        \Session::flash('flash_message','You joined the task successful');
        return "success";
    }


    public function decide($id)
    {
        //need to get data froP database
        $project = Project::find($id);
        $user = \Auth::user();
        $tasks = Project::find($id)->tasks;
        $count = $tasks->count();

        return view('project.profile',compact('project','tasks','count'));
    }


    public function profile()
    {
	    $user = \Auth::user()->student;
		
        $task = $user->tasks()->where('status','=',1)->get()->first();
        //$page = $task->pages()->get()->first();
        $completed_tasks = $user->tasks()->where('completed','=',1)->get();

	    if($task == null){
		  return view('Profile.empty',compact('user'));
	    }
		
        return view('project.profile',compact('task', 'page', 'completed_tasks'));
    }
    
    public function githubCommitStore() {
    
    	$rules = ['commit_comment' => 'required',
    	          'git_name' => 'required',
    	          'git_password' => 'required',
    			];
    	$validator = Validator::make(Input::all(), $rules);
    	if ($validator->fails()) {
    		return Redirect::back()
    		->withErrors($validator)
    		->withInput();
    	} else {
    
    		if(Input::has('task_id')) {
    			$id = Input::get('task_id');
    			$commit_comment = Input::get('commit_comment');
    			$git_name = Input::get('git_name');
    			$git_password = Input::get('git_password');
    			
    			$github = GithubModel::where('task_id', $id)->get();
    			$git_repo = $github[0]->git_repo;
    			$file_name = $github[0]->file_name;
    			$file_route = $github[0]->file_route;
    			$first = 'cd /'.$file_route.'/'.$file_name;
    			$second = 'git commit -m '.'"'.$commit_comment.'"';
    			$third = 'git push https://'.$git_name.':'.$git_password.'@'.$git_repo.' --all';
    			
    			SSH::run(array(
					$first,
					'git add --all',
					$second,
					$third,
					), function($line){
						echo $line.PHP_EOL;// outputs server feedback
					});
    			
    			$github_work_history = new GithubWorkHistoryModel;
    			$github_work_history->commit_comment = Input::get('commit_comment');
    			$github_work_history->task_id = $id;
    			
    			$github_work_history->save();
    			
    			$alert['msg'] = 'Code has been committed successfully';
    			$alert['type'] = 'success';
    			return Redirect::to('profile')->with('alert', $alert);
    		} else {
    			$alert['msg'] = 'Expertise need to create git repostitory';
    			
    			return Redirect::to('profile')->with('alert', $alert);
    		}
    	}
    }

    public function tasks($id){

        $task = task::find($id);
        $user = \Auth::user()->student;

        return view('project.tasks',compact('task','user'));

    }

    public function store()
    {

    }

    public function upload()
    {
        $user = \Auth::user()->student;
        $file = array('file' => Input::file('zip'));
        $destinationPath = storage_path('task/'.$user->id);
        $extension = Input::file('zip')->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        Input::file('zip')->move($destinationPath, $fileName);
        Session::flash('success', 'Upload successfully'); 

        $submission = new submission;
        $submission->file_path = $destinationPath.'/'.$fileName;
        $submission->task_id = $user->tasks->first()->id;
        $submission->user_id = $user->id;
        $submission->validated =1;
        $submission->save();
	
        $task = task::find($user->tasks->first()->id);
		$task->isCommited = 1; // to set flag as task is committed
		$task->save();
			
		return Redirect::to('profile');
        
    }

    public function asyncStart() {
        $projectId = Input::get('project_id');
        $user = \Auth::user();

        $task  = TaskModel::where('project_id','=',$projectId)->firstOrFail();

        if (TaskUser::where('user_id', $user->id)->where('task_id', $task->id)->get()->count() == 0) {
            $userTask = new TaskUser;
            $userTask->user_id = $user->id;
            $userTask->task_id = $task->id;
            $userTask->question_check = 1;
            $userTask->save();
        }

        return Response::json(['result'=>'success']);
    }

    public function compile()
    {
    	return view('project.repo');
    }
	
		
	// TO UPDATE STATUS(Approve) AND SEND MAIL
	public function approve($taskid)
    {
		$task = task::find($taskid);
					
		$task->completed = 1; // to change task status as approved
		$task->isCommited = 0;// to reset committed flag
        $task->save();
		
		$users =   task::find($taskid)->students->first()->user;	// to get user details who belongs task
		//echo "<pre>";
		//print_r($users);exit;
		$info = [
			'email' => $users->email,
			'name' => $users->name,
			'subject' => 'Task Approval',
			];
		$data = ['taskName' => $task->name];  // to send name of task in mail view
		// to sent mail to user whose task is approved
		Mail::send('mail_template.notifyTaskApprove', $data, function ($message) use ($info) {
			$message->to($info['email'], $info['name'])
			->subject($info['subject']);
		});
		echo "Task Approved and Approval Email has been sent";
    }
	
	// TO UPDATE STATUS(Reject) AND SEND MAIL	
	public function reject($taskid)
    {
		$task = task::find($taskid);
						
		$task->completed = 2; // to changes task status as rejected
		$task->isCommited = 0; // to reset committed flag
        $task->save();
		
        $users =   task::find($taskid)->students->first()->user;	// to get user details who belongs task
		
		$info = [
			'email' => $users->email,
			'name' => $users->name,
			'subject' => 'Task Reject',
			];
		$data = ['taskName' => $task->name]; // to send name of task in mail view
		// to sent mail to user whose task is rejected
		Mail::send('mail_template.notifyTaskReject', $data, function ($message) use ($info) {
			$message->to($info['email'], $info['name'])
			->subject($info['subject']);
		});
		echo "Task Rejected and Rejection Email has been sent";
    }
	
	
}

