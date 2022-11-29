@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Schedule</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Edit Schedule
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

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="text-center mt-2">Edit Schedule</h5>
                        </div>
                        @include('messages.alerts')
                        <form action="{{ route('admin.schedule.update', $ofs->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="card-body">
                            
                                <fieldset>
                                    <div class="form-group">
                                        <label for="">Schedule Name</label>
                                        <input type="text" name="sch_name" value="{{ $ofs->name }}" class="form-control">
                                        @error('sch_name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Start Time</label>
                                        <input type="time" name="start_time" value="{{$ofs->start_time}}" class="form-control">
                                        @error('start_time')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">End Time</label>
                                        <input type="time" name="end_time" value="{{$ofs->end_time}}" class="form-control">
                                        @error('end_time')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </fieldset> 
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-flat btn-primary" style="width: 30%; font-size:1.3rem">update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->

@endsection
