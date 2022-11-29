<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\Department;
use App\Employee;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;


use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    //view all attendence
    public function viewAttendence(){
        return view('admin.report.attendenceReport');
        
    }
}
