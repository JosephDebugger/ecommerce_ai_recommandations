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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row d-flex">
                                <a href="{{ url('inventory/view-addProduct') }}"><button class="btn btn-primary">
                                        Add Product
                                    </button></a>
                                <div class="">
                                    <div id="daterange" class="float-end"
                                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; text-align: center;">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span></span>
                                        <i class="fa fa-caret-down" aria-hidden="true" style="font-size:20px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @session('success')
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ $value }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endsession
                            <div class="table-responsive">
                                <table class="table table-bordered" id="daterange_table">
                                    <thead class="">
                                        <tr>
                                            <th style="width: 10px">SN</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Current Stock</th>
                                            <th>Discount amount</th>
                                            <th>Status</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="modal fade" id="addImagesModal" tabindex="-1" aria-labelledby="addImagesLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addImagesLabel">Add Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addImagesForm" method="POST" action="{{ route('inventory.images.store') }}">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <input type="text" name="product_id" id="product_id" hidden>
                            <div id="imageInputs">
                                <div class="input-group mb-3">
                                    <input type="text" name="images[0][id]" class="form-control" hidden value="-1"
                                        hidden>
                                    <input type="file" name="images[0][image_file]" class="form-control"
                                        placeholder="file Name" required>
                                    <input type="text" name="images[0][old_image]" class="form-control" hidden
                                        value="">
                                    <input type="text" name="images[0][description]" class="form-control"
                                        placeholder="Description">
                                    <button type="button" class="btn btn-danger remove-input">X</button>
                                </div>
                            </div>
                            <button type="button" id="addSImagesInput" class="btn btn-secondary">Add More</button>
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
        document.getElementById('addSImagesInput').addEventListener('click', function() {
            const imageInputs = document.getElementById('imageInputs');
            const index = imageInputs.children.length;
            const inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mb-3';
            inputGroup.innerHTML = `
                <input type="number" name="images[${index}][id]" class="form-control" value="-1" hidden>
                <input type="file" name="images[${index}][image_file]" class="form-control" required>
                 <input type="text" name="images[${index}][old_image]" class="form-control" hidden value="">
                <input type="text" name="images[${index}][description]" class="form-control" placeholder="Description">
                <button type="button" class="btn btn-danger remove-input">X</button>
            `;
            imageInputs.appendChild(inputGroup);
        });

        document.getElementById('imageInputs').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-input')) {
                e.target.parentElement.remove();
            }
        });






        var table = '' ;

        $(function() {

            var start_date = moment().subtract(1, 'M');
            var end_date = moment();

            $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

            $('#daterange').daterangepicker({
                startDate: start_date,
                endDate: end_date
            }, function(start_date, end_date) {
                $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format(
                    'MMMM D, YYYY'));
                table.draw(); // Trigger the table redraw when date range is applied
            });

            table = $('#daterange_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('inventory.products') }}",
                    data: function(data) {
                        data.from_date = $('#daterange').data('daterangepicker').startDate.format(
                            'YYYY-MM-DD');
                        data.to_date = $('#daterange').data('daterangepicker').endDate.format(
                            'YYYY-MM-DD'); // Correct the parameter name
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        render: function(data) {
                            return renderImage(data);
                        }
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return renderDropdown(data);
                        }
                    }
                ]
            });
        });

        function renderDropdown(id) {
            return `
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/view-editProduct/${id}">Edit</a>
                        </li>
                        <li>
                            <form action="/productDestroy/${id}" method="post">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                         <li>
                            <a class="dropdown-item" onclick="addImages(${id})">Add New Image</a>
                        </li>
                    </ul>
                </div>
            `;
        }

        function renderImage(data, width = '70px', altText = '') {
            return `<img src="{{ asset('${data}') }}" width="${width}" alt="${altText}">`;
        }

        function addImages(id) {
            $('#addImagesModal').modal('show');
            $('#product_id').val(id);
            // $('#addImagesForm').attr('action', `/inventory/images/store/${id}`);
            $.ajax({
                url: `/inventory/images/${id}`,
                success: function(data) {
                    //alert(JSON.stringify(data));
                    const imageInputs = document.getElementById('imageInputs');
                    imageInputs.innerHTML = '';
                    data.forEach((image, index) => {
                        const inputGroup = document.createElement('div');
                        inputGroup.className = 'input-group mb-3';
                        inputGroup.innerHTML = `
                           <input type="text" name="images[${index}][id]" class="form-control" hidden value="${image.id}" hidden>
                            <input type="file" name="images[${index}][image_file]" class="form-control" value="${image.name}" >
                            <input type="text" name="images[${index}][old_image]" class="form-control" hidden value="${image.name}">
                            <input type="text" name="images[${index}][description]" class="form-control" value="${image.details}">
                           
                        <button type="button" class="btn btn-danger remove-input" onclick="deleteImage(${image.id}, this)">X</button>
                        `;
                        imageInputs.appendChild(inputGroup);
                    });
                }
            }); // End of $.ajex
        }
        $('#addImagesForm').submit(function(e) {
            e.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            const formData = new FormData(this);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    //alert(JSON.stringify(response));
                    table.draw();
                    Swal.fire({
                            title: "Success!",
                            text: response.message,
                            confirmButtonText: "Ok",
                            icon: "success"
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire("Done!", "", "success");
                                
                            } else if (result.isDenied) {
                               
                            }
                        });
                    $('#addImagesModal').modal('hide');
                }
            });
        });


        function deleteImage(id, button) {
            $.ajax({
                url: `/inventory/images/delete/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) { 
                        $(button).closest('.input-group').remove();
                    } else {
                        alert('Failed to delete image');
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        }
    </script>
@endsection
