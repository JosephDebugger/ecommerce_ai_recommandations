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
                            <h3 class="card-title">Update Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('bands.update', $band->id) !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" value="{{ $band->id }}" name="id">
                                        <label for="inputEmail4">Product Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name', $band->name) }}" placeholder="Name">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="details">Description</label>
                                    <textarea type="text" class="form-control"
                                        name="details" name="details" id="details" placeholder="Description">{{ old('details', $band->details) }}</textarea>
                                    @error('details')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="contact_phone">Band Phone</label>
                                        <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" value="{{ old('contact_phone', $band->contact_phone) }}"
                                            name="contact_phone" id="contact_phone" placeholder="Phone">
                                        @error('contact_phone')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="contact_email">Band Email</label>
                                        <input type="text" class="form-control @error('contact_email') is-invalid @enderror" value="{{ old('contact_email', $band->contact_email) }}"
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
                                    <input class="form-input" type="file" name="band_logo" id="band_logo" value="{{ old('band_logo', $band->band_logo) }}">
                                    @error('band_logo')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">

                                    <label class="form-label" for="band_cover">
                                        Upload Cover
                                    </label>
                                    <input class="form-input" type="file" name="band_cover" id="band_cover" value="{{ old('band_cover', $band->band_cover) }}">
                                    @error('band_cover')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                
                              
                                    <div class="form-group">
                                        <label for="inputState">Status</label>
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
