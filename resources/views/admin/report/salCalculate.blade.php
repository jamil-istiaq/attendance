@extends('layouts.app')

@section('content')
<section class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Salary Generator</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Employee Salary Generator
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="col-md-4 mx-auto">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="text-center">Salary Date Range</h5>
        </div>
        <form action="{{ route('admin.salary.cal') }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="card-body">
            <div class="input-group mx-auto" style="width:70%">
                <span class="input-group-text">Salary From</span>
                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                @foreach ($employee as $index => $data)
                <input type="hidden" name="id" value="{{$data->id}}">
                {{-- @endforeach --}}
                <input type="text" name="date_1" id="date_1" class="form-control text-center" >
                @error('date_1')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
                
            </div>
            <div class="input-group mx-auto" style="width:70%">
                <span class="input-group-text">Salary To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                <input type="text" name="date_2" id="date_2" class="form-control text-center" >
                @error('date_2')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group mx-auto" style="width:70%">
                <span class="input-group">Select Scheme &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="input-group-text"><i class="nav-icon fas fa-copy" aria-hidden="true"></i></span>
                <select class="form-control text-center" name="scheme">
                    <option value="Regular">Regular</option>
                    <option value="Over Time">Over Time</option>
                </select>
                @error('date_2')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-flat btn-primary" type="submit">Submit</button>
        </div>
        {{-- </form> --}}
    </div>
</div>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Salary</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            {{-- <th>Employee ID</th> --}}
            <th>Name</th>
            <th>Department</th>
            <th>Total Time (Hours)</th>
            <th>Total Salary</th>
          </tr>
        </thead>
        <tbody>
            
          <tr>            
            <td>{{$data->first_name.' '.$data->last_name}}</td>
            <td>{{$data->department->name}}</td>
            {{-- <td>{{$total_amount}}</td> --}}
            <td>
               <?php
                $taka=round($total_amount/3600,2); 
                echo $taka;
               ?> 
            </td>
            <td>{{$net_sal}}</td>
            @endforeach
          </tr>
          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@endsection

@section('extra-js')

<script>
  $(document).ready(function() {
        $('#date_1').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "YYYY-MM-DD"
            }
        });
        $('#date_2').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "YYYY-MM-DD"
            }
        });
    });
</script>
@endsection