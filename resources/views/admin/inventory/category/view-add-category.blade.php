@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
            <a href="{{ url('categories') }}"><button class="btn btn-primary">
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Add</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('categories.store') !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Category Type</label>
                                        <select  class="form-control @error('name') is-invalid @enderror" value="{{ old('type') }}"
                                            name="type" id="type" >
                                        <option value="male">Male</option> <option value="female">Female</option></select>
                                        @error('type')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Category Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                            name="name" id="name" placeholder="Name">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" name="description"
                                        id="description" placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
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
