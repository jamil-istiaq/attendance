@extends('layouts.app')        

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Project</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Add Project
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Add Project</h5>
                    </div>
                    @include('messages.alerts')
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Project Name</label>
                                    <input type="text" name="project_name" value="{{ old('project_name') }}" class="form-control">
                                    @error('project_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Start Date</label>                                    
                                    <input type="text" name="start_date" id="date" value="{{old('start_date')}}" class="form-control">
                                    @error('start_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">End Date</label>                                    
                                    <input type="text" name="end_date" id="date1" value="{{old('end_date')}}" class="form-control">
                                    @error('end_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>                                    
                                    <select name="status" value="{{old('status')}}" class="form-control">
                                        <option selected disabled>Select Status</option>                                        
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
                                    <textarea name="details" value="" class="form-control">{{old('details')}}</textarea>
                                    @error('details')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>   
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Add Project</button>
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
