@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href="{{ url('users') }}"><button class="btn btn-primary">
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('users.update', $user->id) !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $user->id }}" name="id">
                                        <label for="inputEmail4">User Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Name">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control"
                                        name="description" name="email" id="email" placeholder="email" value="{{ old('email', $user->email) }}">
                                        @error('email')<div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                             
                              

                                
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->




            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
