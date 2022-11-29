@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Project List</h1>
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
                            Projects
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if ($projects->count())
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>                                    
                                    <th>Project</th>
                                    <th>Client</th>                                    
                                    <th>Start</th>
                                    <th>End</th>                            
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $index => $project)
                                <tr>
                                    <td align="center">{{ $index + 1 }}</td>                                                               
                                    <td><a href="{{route('project.view',$project->id)}}" </a>{{ $project->name}}</td>
                                    <td>{{ $project->client->name}}</td>                                    
                                    <td>{{ $project->start}}</td>                                    
                                    <td>{{ $project->end}}</td>
                                    <td>{{ $project->status}}</td>
                                    <td>{{ $project->description}}</td>
                                    <td>
                                        <a href="{{route('project.edit',$project->id)}}" class="btn btn-flat btn-info">Edit</a>                                
                                        <a href="{{route('project.delete',$project->id)}}" class="btn btn-flat btn-danger">Delete</a>
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