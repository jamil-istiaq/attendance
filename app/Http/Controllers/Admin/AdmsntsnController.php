<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Department;
use App\Office_time;
use App\Designation;
use Illuminate\Http\Request;

class AdmsntsnController extends Controller
{
    //create dept
    public function createDept(){
        return view('admin.administration.dept');
    }

    //submit dept
    public function submitDept(Request $request){
        $this->validate($request, [
            'dept_name' => 'required']);

        $dept=new Department();
        $dept->name=$request->dept_name;
        $request->session()->flash('success', 'Department Created');
        $dept->save();
        return redirect()->route('admin.department.create');
    }

    //edit dept
    public function editDept($deptid){
        $dept = Department::where('id','=',$deptid)
        ->first();
        return view('admin.administration.editDept')->with('dept', $dept);
    }

    //update dept
    public function updateDept(Request $request, $deptid){
        $dept = Department::where('id','=',$deptid)
        ->first();

        $dept->name=$request->dept_name;
        $request->session()->flash('success', 'Department Updated');
        $dept->save();
        return redirect()->route('admin.index');
    }

    //delete dept
    public function deleteDept($deptid){
        $dept = Department::where('id','=',$deptid);       
        $dept->delete();
        request()->session()->flash('success', 'Department has been successfully deleted');

        return redirect()->route('admin.deparment.list');
    }

    //view all depts
    public function allDept(){
        $data = [
            'departments' => Department::all(),
        ];
        return view('admin.administration.deptList')->with($data);
    }

    //Create Office time
    public function createOfficeTime(Request $request){
        $this->validate($request, [
            'sch_name' => 'required',
            'start_time'=>'required',
            'end_time'=>'required'
        ]);

        $ofs=new Office_time();
        $ofs->name=$request->sch_name;
        $ofs->start_time=$request->start_time;
        $ofs->end_time=$request->end_time;
        $request->session()->flash('success', 'Office Schedule Created');
        $ofs->save();
        return redirect()->route('admin.schedule.list');
    }

    //update Office time
    public function updateOfficeTime(Request $request, $id){
        $ofs = Office_time::where('id','=',$id)
        ->first();

        $ofs->name=$request->sch_name;
        $ofs->start_time=$request->start_time;
        $ofs->end_time=$request->end_time;
        $request->session()->flash('success', 'Schedule Updated');
        $ofs->save();
        return redirect()->route('admin.schedule.list');
        
    }

    //edit Office time
    public function editTime($id){
        $ofs = Office_time::where('id','=',$id)
        ->first();
        return view('admin.administration.editTime')->with('ofs', $ofs);
    }
    

    //delete Office time
    public function deleteOfficeTime($id){
        $ofs = Office_time::where('id','=',$id);       
        $ofs->delete();
        request()->session()->flash('success', 'Schedule has been successfully deleted');

        return redirect()->route('admin.schedule.list');
    }

    //view all office time
    public function allOfficeTime(){
        $data = [
            'ofs_time' => Office_time::all(),
        ];
        return view('admin.administration.officeTime')->with($data);
        //return view('');
    }


    //view designation
    public function index(){
        $data=[
            'designations'=> Designation::all(),
        ];
        return view('admin.administration.designationView')->with($data);
    }

    //create designation
    public function createDesig(Request $request){
        $this->validate($request, [
            'deg_name' => 'required'            
        ]);

        $dsg= new Designation();
        $dsg->name=$request->deg_name;
        $request->session()->flash('success', 'Designation Created');
        $dsg->save();
        return redirect()->route('admin.designation.list');
        
    }

    //edit designation
    public function editDesig($id){
        $dg = Designation::where('id','=',$id)
        ->first();
        return view('admin.administration.editDesig')->with('dg', $dg);
        
    }

    //update designation
    public function updateDesig(Request $request, $id){
        $dg = Designation::where('id','=',$id)
        ->first();

        $dg->name=$request->deg_name;
        $request->session()->flash('success', 'Designation Updated');
        $dg->save();
        return redirect()->route('admin.designation.list');
        
    }

    //delete designation
    public function deleteDesig($id){
        $dg = Designation::where('id','=',$id);       
        $dg->delete();
        request()->session()->flash('success', 'Designation has been successfully deleted');

        return redirect()->route('admin.designation.list');
        
    }


}
