@extends('backend-master')

@section('breadCrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sales</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales</li>
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
                            <div class="row">
                                <h3 class="card-title ">Sales List</h3>
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
                                            <th>date</th>
                                            <th>Total Amount</th>
                                            <th>Customer Name</th>
                                       
                                            <th>email</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                        </div>

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
                    url: "{{ route('sales.getSales') }}",
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
                        data: 'sale_date',
                        name: 'date'
                    },

                    {
                        data: 'total_amount',
                        name: 'price'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
                            <a class="dropdown-item" href="/saleInvoice/${id}">View Invoice</a>
                        </li>
                       
                    </ul>
                </div>
            `;
        }
    </script>
@endsection
