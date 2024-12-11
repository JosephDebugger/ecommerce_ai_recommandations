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
                                            <th>Date</th>
                                            <th>Total Amount</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
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
        var table = '';
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
                    url: "{{ route('getBandSales') }}",
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

        function renderDropdown(data) {
            return `
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" onclick="changeStatus(${data})">Send for delivery</a>
                               <a class="dropdown-item" onclick="changeStatusReceived(${data})">Product Received</a>
                        </li>
                       
                    </ul>
                </div>
            `;
        }

        function changeStatus(id) {
            var status = 'Delivered';

            var salesId = id;
            //alert(message)
            var data = {
                salesId: salesId,
                status: status,
                _token: "{{ csrf_token() }}"
            }
            $.ajax({
                type: "POST",
                url: `{{ route('sales.sendProduct') }}`,
                data: data,
                dataType: "json",
                success: function(response) {
                    //alert(JSON.stringify(response));
                    if (response == 'success') {
                        table.draw(); 
                        }
                   
                },
                error: function(error) {
                    alert(JSON.stringify(error));
                }
            });
        }
        function changeStatusReceived(id) {
            var status = 'Received';

            var salesId = id;
            //alert(message)
            var data = {
                salesId: salesId,
                status: status,
                _token: "{{ csrf_token() }}"
            }
            $.ajax({
                type: "POST",
                url: `{{ route('sales.sendProduct') }}`,
                data: data,
                dataType: "json",
                success: function(response) {
                    //alert(JSON.stringify(response));
                    if (response == 'success') {
                        table.draw(); 
                        }
                 
                },
                error: function(error) {
                    alert(JSON.stringify(error));
                }
            });
        }
    </script>
@endsection
