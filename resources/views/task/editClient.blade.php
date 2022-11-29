@extends('layouts.app')        

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Client</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit Client
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
                        <h5 class="text-center mt-2">Edit Client</h5>
                    </div>
                    @include('messages.alerts')
                    <form action="{{ route('client.update',$clnt->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Client Name</label>                                    
                                    <input type="text" name="client_name" value="{{$clnt->name}}" class="form-control">
                                    @error('client_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="{{$clnt->email}}" class="form-control">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" value="{{$clnt->phone}}" class="form-control">
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Website</label>
                                    <input type="text" name="website" value="{{$clnt->website}}" class="form-control">
                                    @error('website')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>                                    
                                    <textarea name="address" class="form-control">{{$clnt->address}}</textarea>
                                    @error('address')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Update Client</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                
            </div>
</section>
@endsection
