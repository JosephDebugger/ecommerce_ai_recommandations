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
            <a href="{{ url('inventory/products') }}"><button class="btn btn-default mb-2"><i class="fa fa-chevron-left"
                        aria-hidden="true"></i>
                    Back
                </button></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Add</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{!! route('storeProduct') !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="checkRadio" onclick="loadCategory('male')" value="male"
                                                id="male" checked>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="checkRadio" onclick="loadCategory('female')" value="female"
                                                id="female">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Product Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="Product Name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price">Price <small>(Tk)</small></label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" id="price" placeholder="Price" value="{{ old('price') }}">

                                        @error('price')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="band">Assign to Band <small>(If the product will assign for band)</small></label>
                                        <select id="band" name="band" class="form-control"
                                            value="{{ old('band') }}" >
                                            <option value="">~~ Choose band ~~</option>
                                            @foreach ($bands as $band)
                                                <option value="{{ $band->id }}">{{ $band->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-4">
                                        <label for="brand">Brand</label>
                                        <select id="brand" name="brand" class="form-control"
                                            value="{{ old('brand') }}">

                                            <option value="" selected>~~ Choose Brand ~~</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" class="form-control"
                                            value="{{ old('category') }}" onchange="getSubCategory()">
                                            <option value="">~~ Choose Category ~~</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sub_category">Sub Category</label>
                                        <select id="sub_category" name="sub_category" class="form-control"
                                            value="{{ old('sub_category') }}">
                                            <option value="" selected>~~ Choose Sub Category ~~</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" name="description"  id="description"
                                        placeholder="Description"></textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="add_info">Additional Information</label>
                                    <textarea type="text" class="form-control" name="add_info" id="add_info" placeholder="Additional Information">{{ old('add_info') }}</textarea>
                                    @error('add_info')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="stock">Opening Stock</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                            name="stock" id="stock" placeholder="Opening Stock"
                                            value="{{ old('stock') }}">

                                        @error('stock')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="discount">Discount Price <small>(Tk)</small></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="discount" id="discount" placeholder="Discount Price">
                                        @error('discount')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Status</label>
                                        <select id="status" name="status" class="form-control"
                                            value="{{ old('status') }}">

                                            <option selected>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label class="form-label" for="image">
                                        Upload Image
                                    </label>
                                    <input class="form-input" type="file" name="image" id="image">
                                    @error('image')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" id="tranding"
                                            name="tranding">
                                        <label class="form-check-label" for="tranding">
                                            Tranding
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" id="featured"
                                            name="featured">
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

        function loadCategory(gender){
           // var gender = $('checkRadio').val();
            if(gender ==''){
                $('#sub_category').html($('<option>', {
                                value: ''
                            }).text('~~ Select Sub Catewgory ~~'));
            }
            $.get("get_categories/" + gender, function(data) {
                $("#category").html('');
                data.forEach((value, key) => {
                    $('#category').append($('<option>', {
                                value: value.id
                            }).text(value.name));
                });
            });
        }

        function getSubCategory() {
            var category = $('#category').val();
            if(category ==''){
                $('#sub_category').html($('<option>', {
                                value: ''
                            }).text('~~ Select Sub Catewgory ~~'));
            }
            $.get("get_sub_cat/" + category, function(data) {
                $("#sub_category").html('');
                data.forEach((value, key) => {
                    $('#sub_category').append($('<option>', {
                                value: value.id
                            }).text(value.sub_cetegory_name));
                });
            });
        }
    </script>
@endsection
