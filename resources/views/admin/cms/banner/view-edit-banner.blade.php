@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banners</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
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
            <a href="{{ url('banners') }}"><button class="btn btn-primary">
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Banners</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('banners.update', $banner->id) !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $banner->id }}" name="id">
                                        <label for="inputEmail4">Banners Name</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" id="title" value="{{ old('name', $banner->title) }}" placeholder="Title">
                                        @error('title')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Description</label>
                                    <textarea type="text" class="form-control"
                                        name="description" name="description" id="inputAddress" placeholder="Description">{{ old('description', $banner->description) }}</textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                             
                                <div class="form-group">
                                    <label for="file_name">Banner Image</label>
                                    <input type="file" class="form-control" name="file_name"
                                        id="file_name"   placeholder="file_name">
                                        <input type="text" class="form-control" name="old_file_name" value="{{ $banner->file_name }}" id="file_name"   placeholder="file_name">
                                    @error('file_name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control">

                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
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
