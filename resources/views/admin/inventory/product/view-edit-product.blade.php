@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
            <a href="{{ url('products') }}"><button class="btn btn-primary">
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('updateProduct') !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <label for="inputEmail4">Product Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ $product->name }}" placeholder="Name">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="price" id="price" value="{{ $product->price }}" placeholder="Price">

                                        @error('price')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Brand</label>
                                        <select id="brand" name="brand" class="form-control">

                                            <option>~~ Choose Brand ~~</option>
                                            @foreach ($brands as $brand)
                                                <option id="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option>~~ Choose Category ~~</option>
                                            @foreach ($categories as $category)
                                                <option id="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Sub Category</label>
                                        <select id="sub_category" name="sub_category" class="form-control">
                                            <option>~~ Choose Sub Category ~~</option>
                                            @foreach ($categories as $category)
                                                <option id="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Description</label>
                                    <textarea type="text" class="form-control" value="{{ $product->description }}" name="description" name="description"
                                        id="inputAddress" placeholder="Description"></textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="add_info">Additional Information</label>
                                    <textarea type="text" class="form-control" value="{{ $product->additional_info }}" name="add_info" id="add_info"
                                        placeholder="Additional Information"></textarea>
                                    @error('add_info')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="discount">Discount Price</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="discount" value="{{ $product->discount }}" id="discount">
                                        @error('discount')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Status</label>
                                        <select id="status" name="status" class="form-control">

                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-label" for="image">
                                            Upload Image
                                        </label>
                                        <input class="form-input" type="file" value="{{ $product->image }}"
                                            name="image" id="image">
                                        @error('image')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
