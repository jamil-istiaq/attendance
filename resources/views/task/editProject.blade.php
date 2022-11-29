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
                            <option>Update Project</option>
                        </div>                        
                    </div>
                    <form action="{{route('project.update',$project->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Project Name</label>
                                    <input type="text" name="project_name" value="{{$project->name}}" class="form-control">
                                    @error('project_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Start Date</label>                                    
                                    <input type="text" name="start_date" id="date" value="{{$project->start}}" class="form-control">
                                    @error('start_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">End Date</label>                                    
                                    <input type="text" name="end_date" id="date1" value="{{$project->end}}" class="form-control">
                                    @error('end_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>                        
                                <div class="form-group">
                                    <label for="">Status</label>                                    
                                    <select name="status" value="" class="form-control">
                                        <option selected>{{$project->status}}</option>                                        
                                        <option>Pending</option>
                                        <option>On Hold</option>
                                        <option>Done</option>
                                    </select>     
                                    @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Project Details</label>                                    
                                    <textarea name="details" value="" class="form-control">{{$project->description}}</textarea>
                                    @error('details')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>                            
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-flat btn-primary" style="width: 20%; font-size:1.1rem">Update Project</button>
                            </div>
                        </form>          
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection                            

@section('extra-js')
<script>
   $(document).ready(function() {        
        $('#date').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "YYYY-MM-DD"
            }
        });

        $('#date1').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "YYYY-MM-DD"
            }
        });
    });
</script>
@endsection