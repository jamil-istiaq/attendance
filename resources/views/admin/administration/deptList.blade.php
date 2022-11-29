@extends('layouts.app')        

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Departments Information</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Dept_Info
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: auto">
                        SL. No
                    </th>
                    <th style="width: auto%">
                        Department Name
                    </th>
                    <th style="width: auto" class="text-center">
                        Status
                    </th>
                    <th style="width: auto" class="text-center">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $index => $department)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $department->name}}</td>
                    <td class="project-state text-center">
                        <span class="badge badge-success">Active</span>
                    </td>
                    <td class="project-actions text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.department.edit',$department->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')"
                        href="{{ route('admin.department.delete',$department->id)}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>

                <tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  @endsection