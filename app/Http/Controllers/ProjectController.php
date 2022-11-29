<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
    public function viewtask(){
        return view('task.addProject');
    }

    public function projectList(){
        $data = [
            'projects' => Project::all(),            
        ];
        return view('task.projectIndex')->with($data);
        
    }

    public function storeproject(Request $request, $id){
        $this->validate($request,
        [ 
            'project_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
            'details'=>'required'        
        ]);
        $project= new Project();
        $project->name=$request->project_name;
        $project->start=$request->start_date;
        $project->end=$request->end_date;
        $project->client_id=$id;
        $project->status=$request->status;
        $project->description=$request->details;        
        $project->save();
        $request->session()->flash('success', 'Project Saved');
        return redirect()->route('project.index');

    }

    public function editProject($id){
        $project = Project::where('id','=',$id)
        ->first();        
        return view('task.editProject', compact('project'));
    }

    public function updateProject(Request $request, $id){
        $project=Project::where('id','=',$id)
        ->first();        
        $project->name=$request->project_name;
        $project->start=$request->start_date;
        $project->end=$request->end_date;
        $project->status=$request->status;
        $project->description=$request->details;        
        $project->save();
        $request->session()->flash('success', 'Project Updated');
        return redirect()->route('project.index');
    }

    public function deleteProject($id){
        $project = Project::where('id','=',$id);       
        $project->delete();
        request()->session()->flash('success', 'Project has been successfully deleted');

        return redirect()->route('project.index');
    }

    public function ProjectSortList($id){        
        $projects= Project::where('client_id','=',$id)
        ->get();
        return view('task.sortProject')->with('projects', $projects);
    }

    public function projectView($id){
       $data=[
        'projects'=>Project::where('id','=',$id)
        ->first(),
        'comments'=>Comment::where('project_id','=',$id)
        ->select('message','user_id','created_at','id')
        ->get()
       ];       
        return view('task.projectview')->with($data);
    }

    public function addComment(Request $request, $id){
        $this->validate($request,
        [ 
            'cmnt'=>'required',              
        ]);

        //$userid= Auth::user()->id;
        $userid= Auth::user()->employee->id;
        $comment= new Comment();
        $comment->project_id=$id;
        $comment->message=$request->cmnt;
        $comment->user_id=$userid;
        $comment->save();
        $request->session()->flash('success', 'Comment Added');
        return redirect()->route('project.view',$id);
    }

}
