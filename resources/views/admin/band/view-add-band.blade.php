@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bands</li>
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
            <a href="{{ url('bands') }}"><button class="btn btn-primary">
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Band Add</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('bands.store') !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Band Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                            name="name" id="name" placeholder="Name">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <textarea type="text" class="form-control" name="details"
                                        id="details" placeholder="details">{{ old('details') }}</textarea>
                                    @error('details')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="contact_phone">Band Phone</label>
                                        <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" value="{{ old('contact_phone') }}"
                                            name="contact_phone" id="contact_phone" placeholder="Phone">
                                        @error('contact_phone')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="contact_email">Band Email</label>
                                        <input type="text" class="form-control @error('contact_email') is-invalid @enderror" value="{{ old('contact_email') }}"
                                            name="contact_email" id="contact_email" placeholder="Email">
                                        @error('contact_email')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="form-label" for="band_logo">
                                        Upload Logo
                                    </label>
                                    <input class="form-input" type="file" name="band_logo" id="band_logo">
                                    @error('band_logo')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">

                                    <label class="form-label" for="band_cover">
                                        Upload Cover
                                    </label>
                                    <input class="form-input" type="file" name="band_cover" id="band_cover">
                                    @error('band_cover')
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
