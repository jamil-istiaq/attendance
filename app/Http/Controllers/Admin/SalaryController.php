<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Salary_scheme;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //create scheme
    public function creatSchm(Request $request){
        $this->validate($request, [
            'scm_name' => 'required',
            'amount'=>'required'        
        ]);
        $s_name=new Salary_scheme();
        $s_name->name=$request->scm_name;
        $s_name->amount_hour=$request->amount;
        $request->session()->flash('success', 'Scheme Created');
        $s_name->save();
        return redirect()->route('admin.scheme.list');
    }

    //edit scheme
    public function editSchm($id){
        $scm = Salary_scheme::where('id','=',$id)
        ->first();
        return view('admin.remuneration.editScheme')->with('scm', $scm);
        
    }

    //update scheme
    public function updateSchm(Request $request, $id){
        $scm = Salary_scheme::where('id','=',$id)
        ->first();

        $scm->name=$request->scm_name;
        $scm->amount_hour=$request->amount;
        $request->session()->flash('success', 'Scheme Updated');
        $scm->save();
        return redirect()->route('admin.scheme.list');
        
    }

    //delete scheme
    public function deleteSchm($id){
        $ofs = Salary_scheme::where('id','=',$id);       
        $ofs->delete();
        request()->session()->flash('success', 'Scheme has been successfully deleted');

        return redirect()->route('admin.scheme.list');
    }

    //view scheme
    public function viewSchm(){
        $data = [
            'salary_scheme' => Salary_scheme::all(),
        ];
        return view('admin.remuneration.salaryScheme')->with($data);
        
    }


    //salary report
    public function viewSalReport(){
        $emp_data = [
            'employees' => Employee::all(['id','first_name','last_name','department_id']),
        ];
        return view('admin.report.salaryReport')->with($emp_data);
    }

   
    public function calculateSalary(Request $request){
         $d_1=$request->date_1;
         $d_2=$request->date_2;
         $id=$request->id;
         $scheme=$request->scheme;
         
        $rate= Salary_scheme::where('name','=',$scheme)
            ->select('amount_hour')
            ->first();

        $employee=Employee::where('id','=',$id)
            ->select('id','first_name','last_name','department_id')
            ->get(); 

        $hour = Attendance::select('work_hour')
            ->where('employee_id','=',$id)
            ->whereBetween('created_at',[$d_1,$d_2])
            ->get();
        $w_hour = json_decode(json_encode($hour), true);
        $total_amount = array_sum(array_column($w_hour, 'work_hour'));
        $rate_p=$rate['amount_hour'];
        $net_sal=$total_amount*$rate_p;
        return view('admin.report.salCalculate',compact(['employee','total_amount','net_sal']));

    }

   
}
