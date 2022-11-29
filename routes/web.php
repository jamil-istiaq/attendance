<?php

use App\Http\Controllers\Admin\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//For Client
Route::get('/clients/list', 'ClientController@index')->name('client.index');
Route::get('/clients/create', 'ClientController@create')->name('client.create');
Route::post('/clients/store', 'ClientController@store')->name('client.store');
Route::get('/clients/profile/{id}', 'ClientController@edit')->name('client.edit');
Route::put('/clients/update/{id}', 'ClientController@update')->name('client.update');
Route::get('/clients/delete/{id}', 'ClientController@delete')->name('client.delete');

//routes Task & Project
Route::get('/client/option/{id}', 'ClientController@option')->name('client.option');
Route::get('/client/task/{id}', 'ClientController@viewTask')->name('client.task');
Route::post('/client/task/{id}', 'ClientController@storeTask')->name('client.save');
Route::get('/task/index', 'ClientController@taskList')->name('tasks.index');
Route::get('/task/edit/{id}', 'ClientController@editTask')->name('task.edit');
Route::put('/task/update/{id}', 'ClientController@updateTask')->name('task.update');
Route::get('/task/delete/{id}', 'ClientController@deleteTask')->name('task.delete');
Route::get('/client/list/{id}', 'ClientController@TaskSortList')->name('client.sort');
Route::get('/task/list/', 'DashboardController@List')->name('task.list');
//route for Project
Route::get('/project/create/{id}', 'ProjectController@viewtask')->name('project.create');
Route::post('/project/create/{id}', 'ProjectController@storeproject')->name('project.store');
Route::get('/project/list', 'ProjectController@projectList')->name('project.index');
Route::get('/project/edit/{id}', 'ProjectController@editProject')->name('project.edit');
Route::put('/project/update/{id}', 'ProjectController@updateProject')->name('project.update');
Route::get('/project/delete/{id}', 'ProjectController@deleteProject')->name('project.delete');
Route::get('/project/list/{id}', 'ProjectController@ProjectSortList')->name('project.sort');

//route for comments
Route::get('/task/view/{id}', 'ClientController@taskView')->name('task.view');
Route::get('/project/view/{id}', 'ProjectController@projectView')->name('project.view');
Route::post('/project/comment/{id}','ProjectController@addComment')->name('project.comment');
Route::post('/task/comment/{id}','ClientController@addComment')->name('task.comment');

//route for taskaddTask
Route::get('/task/add', 'ClientController@singletask')->name('task.assign');
Route::post('/task/store', 'ClientController@addTask')->name('task.store');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','can:admin-access'])->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/reset-password', 'AdminController@reset_password')->name('reset-password');
    Route::put('/update-password', 'AdminController@update_password')->name('update-password');

    //Routes for Dept//
    Route::get('/administration/list-depts', 'AdmsntsnController@allDept')->name('deparment.list');
    Route::get('/department/create', 'AdmsntsnController@createDept')->name('department.create');
    Route::post('/department', 'AdmsntsnController@submitDept')->name('department.store');
    Route::get('/department/edit/{deptid}', 'AdmsntsnController@editDept')->name('department.edit');
    Route::put('/department/{deptid}', 'AdmsntsnController@updateDept')->name('department.update');
    Route::get('/department/delete/{deptid}', 'AdmsntsnController@deleteDept')->name('department.delete');
    
    //Routes for Attendance Report
    //Route::get('/employees/attendance/{employee_id}', 'EmployeeController@view')->name('attendance.report');
    Route::get('/employees/attendance/{employee_id}', 'EmployeeController@view')->name('attendance.report');
    Route::get('/employees/attendance/report/{id?}/{month}', 'EmployeeController@viewMonth')->name('attendance.month');

    //Routes for Designation//
    Route::get('/designation/list', 'AdmsntsnController@index')->name('designation.list');
    Route::post('/designation//store', 'AdmsntsnController@createDesig')->name('designation.store');
    Route::get('/designation/edit/{id}', 'AdmsntsnController@editDesig')->name('designation.edit');
    Route::put('/designation/update/{id}', 'AdmsntsnController@updateDesig')->name('designation.update');
    Route::get('/designation/detele/{id}', 'AdmsntsnController@deleteDesig')->name('designation.delete');

    //Routes for Office time //
     Route::get('/office/schedule-list', 'AdmsntsnController@allOfficeTime')->name('schedule.list');
     Route::post('/office/schedule/store', 'AdmsntsnController@createOfficeTime')->name('schedule.store');
     Route::get('/office/edit/{id}', 'AdmsntsnController@editTime')->name('schedule.edit');
     Route::put('/office/update/{id}', 'AdmsntsnController@updateOfficeTime')->name('schedule.update');
     Route::get('/office/detele/{id}', 'AdmsntsnController@deleteOfficeTime')->name('schedule.delete');
     

     //Routes for Remuneration//
     Route::get('/salary/scheme-list', 'SalaryController@viewSchm')->name('scheme.list');
     Route::post('/scheme/store', 'SalaryController@creatSchm')->name('scheme.store');
     Route::get('/scheme/edit/{id}', 'SalaryController@editSchm')->name('scheme.edit');
     Route::put('/scheme/update/{id}', 'SalaryController@updateSchm')->name('scheme.update');
     Route::get('/scheme/detele/{id}', 'SalaryController@deleteSchm')->name('scheme.delete');

     
    //Routes for Reports//
     Route::get('/employees/salary-report', 'SalaryController@viewSalReport')->name('employees.salary');
     Route::get('/employees/salary/show/{id}', 'SalaryController@calculateSalary')->name('salary.show');
     Route::post('/employees/salary/', 'SalaryController@calculateSalary')->name('salary.cal');
     

    // Routes for employees //
    Route::get('/employees/list-employees', 'EmployeeController@index')->name('employees.index');
    Route::get('/employees/add-employee', 'EmployeeController@create')->name('employees.create');
    Route::post('/employees', 'EmployeeController@store')->name('employees.store');
    Route::get('/employees/attendance', 'EmployeeController@attendance')->name('employees.attendance');
    Route::post('/employees/attendance', 'EmployeeController@attendance')->name('employees.attendance');
    Route::delete('/employees/attendance/{attendance_id}', 'EmployeeController@attendanceDelete')->name('employees.attendance.delete');
    Route::get('/employees/profile/{employee_id}', 'EmployeeController@employeeProfile')->name('employees.profile');
    Route::delete('/employees/{employee_id}', 'EmployeeController@destroy')->name('employees.delete');
    // Routes for employees //


    // Routes for leaves //
    Route::get('/leaves/list-leaves', 'LeaveController@index')->name('leaves.index');
    Route::put('/leaves/{leave_id}', 'LeaveController@update')->name('leaves.update');
    // Routes for leaves //

    // Routes for expenses //
    Route::get('/expenses/list-expenses', 'ExpenseController@index')->name('expenses.index');
    Route::put('/expenses/{expense_id}', 'ExpenseController@update')->name('expenses.update');
    // Routes for expenses //

    // Routes for holidays //
    Route::get('/holidays/list-holidays', 'HolidayController@index')->name('holidays.index');
    Route::get('/holidays/add-holiday', 'HolidayController@create')->name('holidays.create');
    Route::post('/holidays', 'HolidayController@store')->name('holidays.store');
    Route::get('/holidays/edit-holiday/{holiday_id}', 'HolidayController@edit')->name('holidays.edit');
    Route::put('/holidays/{holiday_id}', 'HolidayController@update')->name('holidays.update');
    Route::delete('/holidays/{holiday_id}', 'HolidayController@destroy')->name('holidays.delete');
    // Routes for holidays //

});

Route::namespace('Employee')->prefix('employee')->name('employee.')->middleware(['auth','can:employee-access'])->group(function () {
    Route::get('/', 'EmployeeController@index')->name('index');
    Route::get('/profile', 'EmployeeController@profile')->name('profile');
    Route::get('/profile-edit/{employee_id}', 'EmployeeController@profile_edit')->name('profile-edit');
    Route::put('/profile/{employee_id}', 'EmployeeController@profile_update')->name('profile-update');
    
    // Routes for Attendances //
    Route::get('/attendance/list-attendances', 'AttendanceController@index')->name('attendance.index');
    Route::post('/attendance/list-attendances', 'AttendanceController@index')->name('attendance.index');
    Route::post('/attendance/get-location', 'AttendanceController@location')->name('attendance.get-location');
    Route::get('/attendance/register', 'AttendanceController@create')->name('attendance.create');
    Route::post('/attendance/{employee_id}', 'AttendanceController@store')->name('attendance.store');
    Route::put('/attendance/{attendance_id}', 'AttendanceController@update')->name('attendance.update');
    // Routes for Attendances //
    

    // Routes for Leaves //
    Route::get('/leaves/apply', 'LeaveController@create')->name('leaves.create');
    Route::get('/leaves/list-leaves', 'LeaveController@index')->name('leaves.index');
    Route::post('/leaves/{employee_id}', 'LeaveController@store')->name('leaves.store');
    Route::get('/leaves/edit-leave/{leave_id}', 'LeaveController@edit')->name('leaves.edit');
    Route::put('/leaves/{leave_id}', 'LeaveController@update')->name('leaves.update');
    Route::delete('/leaves/{leave_id}', 'LeaveController@destroy')->name('leaves.delete');
    // Routes for Leaves //

    // Routes for Expenses//
    Route::get('/expenses/list-expenses', 'ExpenseController@index')->name('expenses.index');
    Route::get('/expenses/claim-expense', 'ExpenseController@create')->name('expenses.create');
    Route::post('/expenses/{employee_id}', 'ExpenseController@store')->name('expenses.store');
    Route::get('/expenses/edit-expense/{expense_id}', 'ExpenseController@edit')->name('expenses.edit');
    Route::put('/expenses/{expense_id}', 'ExpenseController@update')->name('expenses.update');
    Route::delete('/expenses/{expense_id}', 'ExpenseController@destroy')->name('expenses.delete');
    // Routes for Expenses//

    // Routes for Self //
    Route::get('/self/holidays', 'SelfController@holidays')->name('self.holidays');
    Route::get('/self/salary_slip', 'SelfController@salary_slip')->name('self.salary_slip');
    Route::get('/self/salary_slip_print', 'SelfController@salary_slip_print')->name('self.salary_slip_print');
    // Routes for Self //

     
});