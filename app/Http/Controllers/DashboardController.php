<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function List(){
        $tasks=Task::where('assign_to','=',Auth::user()->employee->id)
        ->get();

    return view('task.empTask')->with('tasks',$tasks);
    }
}
