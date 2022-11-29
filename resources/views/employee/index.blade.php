@extends('layouts.app')        

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <row class="">
        <div class="col-md-12 mx-auto">
          <div class="jumbotron">
            <h1 align="center" class="display-5 text-primary">Welcome to SEMIOTIFY Attendance & Task Management System</h1>
            <p class="lead"></p>
            <hr class="my-4">
            <p align="center">Have a nice day,
              @if ($employee->sex == 'Male')
                Mr. {{ $employee->first_name.' '.$employee->last_name }}
              @else
                Ms. {{ $employee->first_name.' '.$employee->last_name }}
              @endif
            </p>
          </div>
        </div>
      </row>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<section class="content">
  <div class="col-lg-10 mx-auto">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title text-center">
                Week's Tasks
            </div>
            
        </div>
        <div class="card-body">
            @if ($task->count())
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task Name</th>                        
                        <th>Status</th>
                        <th>Due Date</th>                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($task as $index => $task)
                    <tr>
                        <td>{{ $index + 1 }}</td>                                                                                       
                        <td><a href="{{route('task.view',$task->id)}}" </a>{{ $task->task_name}}</td>                        
                        @if($task->status=='Done')
                        <td>
                           <span class="badge badge-success">{{$task->status}}</span>
                       </td>                                    
                        @elseif($task->status=='Due')
                        <td>
                          <span class="badge badge-warning">{{$task->status}}</span>
                      </td>   
                        @elseif($task->status=='Pending')
                        <td>
                          <span class="badge badge-secondary">{{$task->status}}</span>
                      </td>   
                        @elseif($task->status=='On Process')
                        <td>
                          <span class="badge badge-primary">{{$task->status}}</span>
                      </td>   
                        @else
                        <td>
                          <span class="badge badge-danger">{{$task->status}}</span>
                      </td>   
                      @endif
                      <td>{{ $task->due_date}}</td>                                                                              
                        </tr>
                        @endforeach
                </tbody>
            </table>                            
            @else
            <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                <h4>No Records Available</h4>
            </div>
            @endif
            
        </div>
    </div> 
</div>
</section>
<!-- /.content-wrapper -->

@endsection
