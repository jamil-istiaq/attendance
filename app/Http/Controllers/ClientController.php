<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Comment;
use App\Employee;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    //
    public function index(){
        $data = [
            'clients' => Client::all(),
        ];
        return view('task.clientIndex')->with($data);
    }

    public function create(){
        return view('task.addClient');
    }

    public function store(Request $request){
        $this->validate($request,[
            'client_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'website'=>'required',
            'address'=>'required'
        ]);
        $client=new client();
        $client->name=$request->client_name;
        $client->email=$request->email;
        $client->phone=$request->phone;
        $client->website=$request->website;
        $client->address=$request->address;

        $request->session()->flash('success', 'Client Added');
        $client->save();
        return redirect()->route('client.index');
    }

    public function edit($id){
        $clnt = Client::where('id','=',$id)
        ->first();
        return view('task.editClient')->with('clnt', $clnt);
    }

    public function update(Request $request, $id){
        $client=Client::where('id','=',$id)
        ->first();
        
        $client->name=$request->client_name;
        $client->email=$request->email;
        $client->phone=$request->phone;
        $client->website=$request->website;
        $client->address=$request->address;
        $request->session()->flash('success', 'Client Updated');
        $client->save();
        return redirect()->route('client.index');
    }

    public function delete($id){
        $client = Client::where('id','=',$id);       
        $client->delete();
        request()->session()->flash('success', 'Client has been successfully deleted');

        return redirect()->route('client.index');
    }

    public function option($id){
        $client = Client::where('id','=',$id)
        ->first();
        return view('task.options')->with('client', $client);
    }

    public function viewTask(){
        $user= Employee::all();
        return view('task.addTask')->with('user', $user);
    }

    public function taskList(){
        $data = [
            'tasks' => Task::all(),            
        ];
        return view('task.taskIndex')->with($data);
        
    }

    public function storeTask(Request $request, $id){
        $this->validate($request,
        [ 
            'task_name'=>'required',
            'employee'=>'required',
            'date'=>'required',
            'status'=>'required',
            'task_dis'=>'required'        
        ]);
        $task= new Task();
        $task->task_name=$request->task_name;
        $task->assign_to=$request->employee;
        $task->due_date=$request->date;
        $task->client_id=$id;
        $task->status=$request->status;
        $task->details=$request->task_dis;        
        $task->save();
        $request->session()->flash('success', 'Task Saved');
        return redirect()->route('tasks.index');
    }
    

    public function editTask($id){
        $task = Task::where('id','=',$id)
        ->first();
        $user= Employee::all();        
        return view('task.editTask', compact('task','user'));
    }

    public function updateTask(Request $request, $id){
        $task=Task::where('id','=',$id)
        ->first();
        $task->task_name=$request->task_name;
        $task->assign_to=$request->employee_id;
        $task->due_date=$request->date;        
        $task->status=$request->status;
        $task->details=$request->task_dis;        
        $task->save();
        $request->session()->flash('success', 'Task Updated');
        return redirect()->route('tasks.index');
    }

    public function deleteTask($id){
        $task = Task::where('id','=',$id);       
        $task->delete();
        request()->session()->flash('success', 'Task has been successfully deleted');

        return redirect()->route('tasks.index');
    }

    public function TaskSortList($id){        
        $tasks= Task::where('client_id','=',$id)
        ->get();
        return view('task.sortTask')->with('tasks', $tasks);
    }

    public function taskView($id){
        $data=[
            'tasks'=>Task::where('id','=',$id)
            ->first(),
            'comments'=>Comment::where('task_id','=',$id)
            ->select('message','user_id','created_at','id')
            ->get(),
            'employees'=>Employee::all('id','first_name')            
           ];                  
           return view('task.taskview')->with($data);
    }

    public function addComment(Request $request, $id){
        $this->validate($request,
        [ 
            'cmnt'=>'required',              
        ]);

        $userid= Auth::user()->id;
        //$userid= Auth::user()->employee->id;        
        $comment= new Comment();
        $comment->task_id=$id;
        $comment->message=$request->cmnt;
        $comment->user_id=$userid;
        $comment->save();
        $request->session()->flash('success', 'Comment Added');
        return redirect()->route('task.view',$id);
    }

    public function addTask(Request $request){
        $this->validate($request,
        [ 
            'task_name'=>'required',
            'employee'=>'required',
            'date'=>'required',
            'status'=>'required',
            'task_dis'=>'required'        
        ]);
        $task= new Task();
        $task->task_name=$request->task_name;
        $task->assign_to=$request->employee;
        $task->due_date=$request->date;        
        $task->status=$request->status;
        $task->details=$request->task_dis;        
        $task->save();
        $request->session()->flash('success', 'Task Saved');
        return redirect()->route('tasks.index');
    }

    public function singletask(){
        $user= Employee::all();
        return view('task.singleTask')->with('user', $user);
    }
}
