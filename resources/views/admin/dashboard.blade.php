@extends('backend-master')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$orders}}</h3>

                    <p>Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('/sales/getSales')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$bounced}}<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounced Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('/sales/getSales')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$customers}}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$bands}}</h3>

                    <p>Bands</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('bands')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Sales
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                          
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


       
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">


        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
@endsection
@section('scripts')
<script>
   $(document).ready(function () {
            // Fetch data from the Laravel API
            $.ajax({
                url: '/sales-data',
                method: 'GET',
                success: function (response) {
                    //alert(response)
                    // Process the response data
                    const labels = response.map(item => item.sale_date);
                    const data = response.map(item => item.total_amount);

                    // Render the Chart.js graph
                    const ctx = document.getElementById('revenue-chart-canvas').getContext('2d');
                    new Chart(ctx, {
                        type: 'line', // Choose chart type (e.g., 'bar', 'pie')
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Sales Amount',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function (error) {
                    console.error('Error fetching sales data:', error);
                }
            });
        });
    </script>


@endsection