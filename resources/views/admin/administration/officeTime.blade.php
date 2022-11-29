@extends('layouts.app')        

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Office Schedule</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Add Schedule
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
                        <h5 class="text-center mt-2">Add New Schedule</h5>
                    </div>
                    @include('messages.alerts')
                    <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Schedule Name</label>
                                    <input type="text" name="sch_name" value="{{ old('sch_name') }}" class="form-control">
                                    @error('sch_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control">
                                    @error('start_time')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">End Time</label>
                                    <input type="time" name="end_time" value="{{ old('end_time') }}" class="form-control">
                                    @error('end_time')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </fieldset> 
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-flat btn-primary" style="width: 30%; font-size:1.3rem">Add Schedule</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->


<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Office Schedule List</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: auto">
                        Sl. No.
                    </th>
                    <th style="width: auto%">
                        Schedule
                    </th>
                    <th style="width: auto" class="text-center">
                        Start
                    </th>
                    <th style="width: auto" class="text-center">
                        End
                    </th>
                    <th style="width: auto" class="text-center">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ofs_time as $index => $ofs)
                <tr>
                    <td>
                        {{ $index + 1 }}
                    </td>
                    <td>
                        <a>
                            {{ $ofs->name}}
                        </a>
                    </td>
                    <td class="text-center">
                        <span>{{$ofs->start_time}}</span>
                    </td>
                    <td class="text-center">
                        <span>{{$ofs->end_time}}</span>
                    </td>
                    <td class="project-actions text-center">                    
                        <a class="btn btn-info btn-sm" href="{{ route('admin.schedule.edit',$ofs->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')"
                        href="{{ route('admin.schedule.delete',$ofs->id)}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection
