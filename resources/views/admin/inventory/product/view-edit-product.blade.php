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
            <a href="{{ url('inventory/products') }}"><button class="btn btn-primary">
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
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            @php
                                                if ($product->cloth_for == 'male') {
                                                    $maleChecked = 'checked';
                                                    $femaleChecked = '';
                                                } else {
                                                    $maleChecked = '';
                                                    $femaleChecked = 'checked';
                                                }
                                            @endphp
                                            <input class="form-check-input" type="radio" name="checkRadio"
                                                onclick="loadCategory('male')" value="male" id="male"
                                                {{ $maleChecked }}>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="checkRadio"
                                                onclick="loadCategory('female')" value="female" id="female"
                                                {{ $femaleChecked }}>
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <label for="inputEmail4">Product Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ $product->name }}" placeholder="Name">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="price" id="price" value="{{ $product->price }}" placeholder="Price">

                                        @error('price')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="band">Assign to Band <small>(If the product will assign for
                                                band)</small></label>
                                        <select id="band" name="band" class="form-control"
                                            value="{{ old('band') }}">
                                            <option value="">~~ Choose band ~~</option>
                                            @foreach ($bands as $band)
                                                @if ($product->band_id == $band->id)
                                                    <option value="{{ $band->id }}" selected>{{ $band->name }}
                                                    </option>
                                                @else
                                                    <option id="{{ $band->id }}">{{ $band->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Brand</label>
                                        <select id="brand" name="brand" class="form-control">

                                            <option>~~ Choose Brand ~~</option>
                                            @foreach ($brands as $brand)
                                                @if ($product->brand_id == $brand->id)
                                                    <option id="{{ $brand->id }}" selected>{{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option id="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Category</label>
                                        <select id="category" name="category" class="form-control"
                                            onchange="getSubCategory()">
                                            <option>~~ Choose Category ~~</option>
                                            @foreach ($categories as $category)
                                                @if ($product->category_id == $category->id)
                                                    <option id="{{ $category->category_id }}" selected>
                                                        {{ $category->name }}</option>
                                                @else
                                                    <option id="{{ $category->category_id }}">{{ $category->name }}
                                                    </option>
                                                @endif
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
                                    <textarea type="text" class="form-control" value="{{ $product->description }}" name="description"
                                        name="description" id="inputAddress" placeholder="Description"></textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="add_info">Additional Information</label>
                                    <textarea type="text" class="form-control" value="{{ $product->additional_info }}" name="add_info"
                                        id="add_info" placeholder="Additional Information"></textarea>
                                    @error('add_info')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="current_stock">Current Stock</label>
                                        <input type="number" class="form-control"
                                            name="current_stock" value="{{ $product->stock }}" id="current_stock" readonly>
                                      
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="newQuantity">Add Quantity</label>
                                        <input type="number" id="newQuantity" name="newQuantity" class="form-control">
                                    </div>

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
                                            @php
                                                if ($product->status == 'Active') {
                                                    $activeSelected = 'selected';
                                                    $inactiveSelected = '';
                                                } else {
                                                    $activeSelected = '';
                                                    $inactiveSelected = 'selected';
                                                }
                                            @endphp
                                            <option value="Active" {{ $activeSelected }}>Active</option>
                                            <option value="Inactive" {{ $inactiveSelected }}>Inactive</option>

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
                                            <input type="text" value="{{ $product->image }}" name="old_image" hidden>
                                        @error('image')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        @php
                                            if ($product->Tranding == 'Yes') {
                                                $trandChecked = 'checked';
                                            } else {
                                                $trandChecked = '';
                                            }
                                        @endphp
                                        <input class="form-check-input" type="checkbox" value="Yes" id="tranding"
                                            name="tranding" {{ $trandChecked }}>
                                        <label class="form-check-label" for="tranding">
                                            Tranding
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        @php
                                            if ($product->featured == 'Yes') {
                                                $featuredChecked = 'checked';
                                            } else {
                                                $featuredChecked = '';
                                            }
                                        @endphp
                                        <input class="form-check-input" type="checkbox" value="Yes" id="featured"
                                            name="featured" {{ $featuredChecked }}>
                                        <label class="form-check-label" for="featured">
                                            Featured
                                        </label>
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
@section('scripts')
    <script>
        function getSubCategory() {
            $.get("demo_test.asp", function(data, status) {
                alert("Data: " + data + "\n Status: " + status);
            });
        }
    </script>
@endsection
