@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Client List</h1>
            </div>          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('messages.alerts')
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title text-center">
                            Clients
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if ($clients->count())
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Client Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Address</th>                            
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $index => $client)
                                <tr>
                                    <td align="center">{{ $index + 1 }}</td>                                                               
                                    <td><a href="{{route('client.option',$client->id)}}" </a>{{ $client->name}}</td>
                                    <td>{{ $client->email}}</td>
                                    <td>{{ $client->phone}}</td>
                                    <td>{{ $client->website}}</td>
                                    <td>{{ $client->address}}</td>
                                    <td>
                                        <a href="{{route('client.edit',$client->id)}}" class="btn btn-flat btn-info">Edit</a>                                
                                        <a href="{{route('client.delete',$client->id)}}" class="btn btn-flat btn-danger">Delete</a>
                                    </td>                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                            
                        @else
                        <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                            <h4>No Records Available</h4>
                        </div>
                        @endif
                        
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>

@endsection
@section('extra-js')

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive:true,
            autoWidth: false,
        });
    });
</script>
@endsection