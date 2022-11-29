@extends('layouts.app')

@section('content')
<section class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Attendance Report Generator</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Employee Attendance Generator
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Report</h3>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">    
   
   
      <table class="table table-bordered">
        <thead>
          <tr>            
            <th>Sl No</th>
            <th>Date</th>
            <th>Entry Time</th>
            <th>Exit Time</th>
          </tr>
        </thead>
        <tbody>  
          
            @foreach($data as $index => $dt)
            <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{$dt->created_at->format('Y-m-d')}}</td>
            <td>{{$dt->created_at->format('H:i:s')}}</td>
            <td>{{$dt->updated_at->format('H:i:s')}}</td>
            </tr>
            @endforeach            
           
           
            <span class="dtr-data">
              
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['0']]) }}" class="btn btn-flat btn-info">Jan Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['1']]) }}" class="btn btn-flat btn-info">Feb Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['2']]) }}" class="btn btn-flat btn-info">Mar Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['3']]) }}" class="btn btn-flat btn-info">Apr Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['4']]) }}" class="btn btn-flat btn-info">May Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['5']]) }}" class="btn btn-flat btn-info">Jun Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['6']]) }}" class="btn btn-flat btn-info">Jul Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['7']]) }}" class="btn btn-flat btn-info">Aug Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['8']]) }}" class="btn btn-flat btn-info">Sep Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['9']]) }}" class="btn btn-flat btn-info">Oct Report</a>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['10']]) }}" class="btn btn-flat btn-info">Nov Report</a>
              <hr>
              <a href="{{route('admin.attendance.month',['id'=>$employee['id'], 'month'=>$months['11']]) }}" class="btn btn-flat btn-info">Dec Report</a>
            </span>
           <hr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@endsection
