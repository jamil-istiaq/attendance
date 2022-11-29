@extends('layouts.app')        

@section('content')
<section class="content">
    <div class="container-fluid">
        @include('messages.alerts')
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h2>{{$client->name}}<h2>
                        </div>                        
                    </div>
                    <div class="card-body text-center">                        
                        <a href="{{route('client.task',$client->id)}}" class="btn btn-app bg-secondary">
                            <i class="fas fa-edit"></i> Add Task
                        </a>

                        <a href="{{route('project.create',$client->id)}}" class="btn btn-app bg-success">
                            <i class="fas fa-edit"></i> Add Project
                        </a>

                        <a href="{{route('project.sort',$client->id)}}" class="btn btn-app bg-info">
                            <i class="nav-icon fas fa-th"></i> Project List
                        </a>
                        <a href="{{route('client.sort',$client->id)}}" class="btn btn-app bg-primary">
                            <i class="nav-icon fas fa-th"></i> Task List
                        </a>      
                    </div>                    
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection                            
