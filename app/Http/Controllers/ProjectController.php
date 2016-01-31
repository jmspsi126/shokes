<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\task;
use App\User;
use App\TaskUser;

use Input;
use Request;
use Session;
use Redirect;
use Vinkla\GitLab\Facades\GitLab;

class ProjectController extends Controller
{


    public function __construct(){

        $this->middleware('auth');
        $this->middleware('student');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
{
    /*$this->middleware('auth');*/
$projects = project::latest()->get();

//        dd(Gitlab::api('repositories')->blob(632657,'master','.env.example'));


return view('project.main',compact('projects'));
//        return view('project.test');

}

    public function decide($id)
    {
        //need to get data froP database
        $project = Project::find($id);
        
        $user = \Auth::user();

        
        $tasks = task::where('project_id','=',$id)->get();
        $count = $tasks->count();
        
        if ($count > 0) {
	        $task  = task::where('project_id','=',$id)->firstOrFail();
	        
	        if (TaskUser::where('user_id', $user->id)->where('task_id', $task->id)->get()->count() == 0) {
	        	$userTask = new TaskUser;
	        	$userTask->user_id = $user->id;
	        	$userTask->task_id = $task->id;
	        	$userTask->save();
	        } 
        }
        

        return view('project.profile',compact('project','tasks','count'));
    }

    public function upload()
    {

        $file = array('file' => Input::file('zip'));
        $destinationPath = 'app/storage';
        $extension = Input::file('zip')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        Input::file('zip')->move($destinationPath, $fileName);
        Session::flash('success', 'Upload successfully'); 
        return Redirect::to('project');
        
    }


    public function compile()
    {
    	
        return view('project.repo');

    }
}
