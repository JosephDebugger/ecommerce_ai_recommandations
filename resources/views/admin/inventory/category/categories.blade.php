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
            <a href="{{ url('categories/create') }}"><button class="btn btn-primary">
                    Add Category
                </button></a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubCategoryModal">Add Subcategories</button>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> {{ session('success') }} </strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 10px">SN</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Statuc</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>{{ $category->status }}</td>
                                            <td>



                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE') 
                                                                <button type="submit" class="btn">Delete</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <div class="dropdown-divider"></div>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-primary" href="#" data-bs-toggle="collapse" data-bs-target="#subcategories-{{ $category->id }}" aria-expanded="false">
                                                                View Subcategories
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="collapse mt-2" id="subcategories-{{ $category->id }}">
                                                    @if ($category->subCategories->isNotEmpty())
                                                        <ul class="list-group">
                                                            @foreach ($category->subCategories as $subcategory)
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span>
                                                                        <strong>{{ $subcategory->sub_cetegory_name }}</strong> - {{ $subcategory->description }}
                                                                    </span>
                                                                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                    </form>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-muted">No subcategories available.</p>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
        <!-- Modal -->
<div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubCategoryLabel">Add Subcategories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addSubCategoryForm" method="POST" action="{{ route('subcategories.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Select Category</label>
                        <select class="form-select" name="category_id" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="subcategoryInputs">
                        <div class="input-group mb-3">
                            <input type="text" name="subcategories[0][name]" class="form-control" placeholder="Subcategory Name" required>
                            <input type="text" name="subcategories[0][description]" class="form-control" placeholder="Description">
                            <button type="button" class="btn btn-danger remove-input">X</button>
                        </div>
                    </div>
                    <button type="button" id="addSubcategoryInput" class="btn btn-secondary">Add More</button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
document.getElementById('addSubcategoryInput').addEventListener('click', function () {
    const subcategoryInputs = document.getElementById('subcategoryInputs');
    const index = subcategoryInputs.children.length;
    const inputGroup = document.createElement('div');
    inputGroup.className = 'input-group mb-3';
    inputGroup.innerHTML = `
        <input type="text" name="subcategories[${index}][name]" class="form-control" placeholder="Subcategory Name" required>
        <input type="text" name="subcategories[${index}][description]" class="form-control" placeholder="Description">
        <button type="button" class="btn btn-danger remove-input">X</button>
    `;
    subcategoryInputs.appendChild(inputGroup);
});

document.getElementById('subcategoryInputs').addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-input')) {
        e.target.parentElement.remove();
    }
});

</script>
@endsection
