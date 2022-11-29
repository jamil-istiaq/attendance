<?php

namespace App\Exports;
use App\Employee;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportView implements FromQuery
{
   use Exportable;

   public function __construct(int $id)
   {
       $this->id = $id;
   }
   
   public function query()
   {
    Employee::select('first_name','last_name','desg')
        ->where('id','=', $this->id);

    Attendance::select('created_at','updated_at')
        ->where('employee_id','=', $this->id)
        ->whereMonth('created_at', Carbon::now()->month);
   }
}
