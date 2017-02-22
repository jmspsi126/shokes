<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Controllers\Controller;
use App\project;
use App\task;
use App\Page;
use App\skill;
use App\UserPivot;
use App\MediaWiki\MediaWiki;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash; // to compare password
use Illuminate\Http\Request; 
use SimpleSoftwareIO\SMS\Facades\SMS;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('company');

    }

    public function index()
    {
        return view('client.app');
    }

    public function post(){

        $skills = skill::all();

        return view('lazylogin',compact('skills'));
    }

    public function manage(){

        $projects = \Auth::user()->company->project;// condition added to show only open project's
		
		if($projects->first() == null){
			return view('lazylogin');
		}
			return view('client.Manage',compact('projects'));

    }

    public function progress($id){
        $user = \Auth::user();
        $project = Project::find($id);
		
		$pages = $project->pages; //to get page information
		
		
		//print_r($project);exit;
        if($project->tasks()->where('status','=',0)->first()){        			
            return view('client.progress',compact('project','user','pages'));
        }
        else{
            return view('client.empty',compact('project','user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {


        $ProjectInfo = $request->all();
		
        $ProjectInfo['company_id'] = \Auth::user()->company->id;
        project::create($ProjectInfo);
		 
        $project = project::find(\DB::getPdo()->lastInsertId());

        $tags = Input::all()["tags"];
        foreach ($tags as $tag) {
            if(is_numeric($tag)){
                $skill = skill::find($tag);
		try{
                $project->skill()->attach($skill->id);}
		catch(\Exception $e){
		}
            }
            elseif(gettype($tag) =="string"){
                $skill = skill::create(['name'=>$tag]);
                $project->skill()->attach($skill->id);
            }
            else{
                // dd(gettype($tag));
            }
        };

        $mediawiki = new mediawiki();

        $page = new Page();
        $page->title = 'Client Requirement';
        $page->raw = $project->description;
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);

        $page = new Page();
        $page->title = 'Q&A';
        $page->raw = "Please share us your questions or concern";
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);



        $page = new Page();
        $page->title = 'Feedback';
        $page->raw = "Please write your feedback here";
        $page->parse();
        $page->save();
        $project->pages()->attach($page->id);
        $this->bind($page->id,$page->title);
        $mediawiki->savePageInMediaWiki($page->title,"",$project->id);


        return Redirect::to('client/manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	// to delete /end project
	public function delete(Request $request)
    {	
		//to verify password before end project
		if (Hash::check(Input::get('password'), auth()->user()->password)) {
			// to update project
			$project = Project::find(Input::get('id'));
			$project->isDelete = 1; //update delete flag
			$project->delete_reason = Input::get('delete_reason'); //delete reason
			$project->status = "Completed";//change open to completed
			$project->save();
						
			$request->session()->flash('delete-success', 'Record Deleted Successfully');
		}
		else{
			$request->session()->flash('delete-error', 'Please enter correct password');
		}
		return Redirect::back();
    }

    private function bind($id, $title)
    {
        $UserPivot = new UserPivot();
        $UserPivot->page_id = $id;
        $UserPivot->user_id = \Auth::user()->id;
        $UserPivot->is_editor = 1;
        $UserPivot->save();
        return;
        
    }
}
