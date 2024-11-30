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
    </section>
    <!-- /.content -->
@endsection


@section('scripts')
    <script>
     

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

            var table = $('#daterange_table').DataTable({
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
                    </ul>
                </div>
            `;
        }

        function renderImage(data, width = '70px', altText = '') {
            return `<img src="${data}" width="${width}" alt="${altText}">`;
        }
    </script>
@endsection
