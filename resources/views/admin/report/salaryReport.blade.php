@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Employee Salary</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Employee Salary
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
    
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Sl. No</th>
            <th>Employee Name</th>
            <th>Department</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($employees as $index => $edata)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$edata->first_name.' '.$edata->last_name}}</td>
            <td>{{$edata->department->name}}</td>
            <td>
                <a class="btn btn-success btn-sm" href="{{route('admin.salary.show',$edata->id)}}">
                    <i class="fas fa-dollar-sign">
                    </i>
                    Calculate
                </a>
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@endsection

