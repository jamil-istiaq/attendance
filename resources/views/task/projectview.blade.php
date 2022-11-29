@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Project Details</h1>
            </div>          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @include('messages.alerts')
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h2>{{$projects->name}}</h2>
                        </div>
                        
                    </div>
                    <div class="card-body">                        
                        <table class="table table-bordered" id="dataTable">                    
                            <thead>
                                <tr>
                                  <th>Client Name</th>
                                  <td>{{$projects->client->name}}</td>
                                  <td rowspan="6"><b>Task Description</b><br>{{$projects->description}}
                                  </td>  
                                </tr>                                                            
                                <tr>
                                  <th>Project Status</th>
                                  <td>{{$projects->status}}</td>
                                </tr>
                              </thead>                                                                   
                        </table>
                        <table class="table table-bordered" id="dataTable">                    
                            <thead>
                               
                                  <th colspan="3">Comments</th>
                                  @foreach ($comments as $index => $cmnt)                                  
                                  <tr>
                                    <td>{{$cmnt->employee->first_name.' '.$cmnt->employee->last_name}}  => [{{$cmnt->created_at->format('d-M-Y')}}]</td>
                                    <td>{{$cmnt->message}}</td>
                                    <td>
                                        {{-- <a href="" class="btn btn-flat btn-info">Edit</a>--}}
                                        <a href="" class="btn btn-flat btn-danger">Delete</a>
                                    </td>
                                  </tr>
                                  @endforeach 
                                                                                                                          
                              </thead>                                                                   
                        </table>
                        <form action="{{route('project.comment',$projects->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                        
                                <fieldset>
                                    <div class="form-group">
                                        <label for="">Add Comments</label>
                                        <textarea name="cmnt" class="form-control">{{old('cmnt')}}</textarea>
                                        @error('cmnt')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-flat btn-primary" style="width: 20%; font-size:1.1rem">Add</button>
                            </div>
                        </form>                             
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>

@endsection
