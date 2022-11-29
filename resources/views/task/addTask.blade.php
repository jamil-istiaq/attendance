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
                            <option>Add Task</option>
                        </div>                        
                    </div>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Task Name</label>
                                    <input type="text" name="task_name" value="{{ old('task_name') }}" class="form-control">
                                    @error('task_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Assign To</label>
                                    <select name="employee" value="{{old('employee')}}" class="form-control">
                                        <option selected disabled>Select Employee</option>
                                        @foreach ($user as $u)
                                            <option value="{{$u->id}}">{{$u->first_name.' '.$u->last_name }}</option>
                                        @endforeach
                                    </select>                          
                                    @error('employee')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Due Date</label>                                    
                                    <input type="text" name="date" id="date" value="{{old('date')}}" class="form-control">
                                    @error('date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Status</label>                                    
                                    <select name="status" value="{{old('status')}}" class="form-control">
                                        <option selected disabled>Select Status</option>
                                        <option>Due</option>
                                        <option>Pending</option>
                                        <option>On Process</option>
                                        <option>Done</option>
                                    </select>     
                                    @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Task Description</label>
                                    <textarea name="task_dis" class="form-control">{{old('task_dis')}}</textarea>
                                    @error('task_dis')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>                                
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-flat btn-primary" style="width: 20%; font-size:1.1rem">Save Task</button>
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
    });
</script>
@endsection