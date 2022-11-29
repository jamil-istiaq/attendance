@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Task List</h1>
            </div>          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('messages.alerts')
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title text-center">
                            Tasks
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if ($tasks->count())
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Project</th>
                                    <th>Client</th>                                    
                                    <th>Assign</th>
                                    <th>Due Date</th>                            
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                <tr>
                                    <td align="center">{{ $index + 1 }}</td>                                                               
                                    <td><a href="{{route('task.view',$task->id)}}" </a>{{ $task->task_name}}</td>
                                    <td>{{ $task->project_id}}</td>                                    
                                    <td>{{ $task->client->name}}</td>                                    
                                    <td>{{ $task->employee->first_name.' '.$task->employee->last_name}}</td>                                    
                                    <td>{{ $task->due_date}}</td>
                                    <td>{{ $task->status}}</td>
                                    <td>{{ $task->details}}</td>
                                    <td>
                                        <a href="{{route('task.edit',$task->id)}}" class="btn btn-flat btn-info">Edit</a>                                
                                        <a href="{{route('task.delete',$task->id)}}" class="btn btn-flat btn-danger">Delete</a>
                                    </td>                                   
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
        </div>
    </div>
</section>

@endsection
@section('extra-js')

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive:true,
            autoWidth: false,
        });
    });
</script>
@endsection