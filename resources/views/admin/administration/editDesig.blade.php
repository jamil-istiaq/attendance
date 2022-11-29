@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Designation</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Edit Designation
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
                            <h5 class="text-center mt-2">Edit Designation</h5>
                        </div>
                        @include('messages.alerts')
                        <form action="{{ route('admin.designation.update', $dg->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="card-body">
                            
                                <fieldset>
                                    <div class="form-group">
                                        <label for="">Designation Name</label>
                                        <input type="text" name="deg_name" value="{{ $dg->name }}" class="form-control">
                                        @error('deg_name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>                        
                                </fieldset> 
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-flat btn-primary" style="width: 30%; font-size:1.3rem">Update</button>
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
