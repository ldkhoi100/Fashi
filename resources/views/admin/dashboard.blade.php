@extends('admin.layouts')

@section('title', 'Dashboard')

@section('content')

<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('partials.message')
        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div> --}}

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($earnings, 2) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Product input</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_products_input }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products sold
                                    <span style="color:black; font-size: 1.2rem; margin-left: 10px">{{ $products_sold }}
                                    </span>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ number_format($products_sold * 100 / $total_products_input, 2) }}%
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ number_format($products_sold * 100 / $total_products_input, 2) }}%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($pending_bills) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product warehouse</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Go to:</div>
                                <a class="dropdown-item" href="{{ route('product.index') }}">Product</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p style="color:orange; font-size:16px; font-weight: bold">There are {{ $outOfStock }} products
                            out of stock, and {{ $leftQuantity }} products only less than 10 left !</p>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Views</th>
                                    <th width='15.2%'>Sold out</th>
                                    <th>Quantity</th>
                                    @if(!Auth::check())
                                    @elseif(Auth::user()->username == "ldkhoi97")
                                    <th>Update(+/-)</th>
                                    <th>Edit</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 0 ?>
                                @foreach ($products as $key => $products)

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><b><a href="{{ route('getDetailProductMen', $products->id) }}"
                                                style="color:#8B0000;" target="_blank">{{ $products->name }}
                                            </a><br><span
                                                style="color: #b2b2b2; font-size: 11px; float: right">{{ $products->categories->name }}</span></b>
                                    </td>
                                    <td align="center"><b
                                            style="color: white; border-radius: 3px; padding: 3px 7px; background: #40E0D0">{{ $products->view_count }}</b>
                                    </td>
                                    <td align="center"><b
                                            style="color: white; border-radius: 3px; padding: 3px 7px; background: #f6c23e">{{ $number_sold_out[$i] }}</b>
                                    </td>
                                    <td align="center">
                                        @if($products->amount < 1) <b
                                            style="color: white; border-radius: 3px; padding: 3px 7px; background: #DC143C">
                                            {{ $products->amount }}</b>
                                            @elseif($products->amount < 11) <b
                                                style="color: white; border-radius: 3px; padding: 3px 7px; background: #FF7F50">
                                                {{ $products->amount }}</b>
                                                @else
                                                <b
                                                    style="color: white; border-radius: 3px; padding: 3px 7px ; background: #6495ED">{{ $products->amount }}</b>
                                                @endif
                                    </td>

                                    @if(!Auth::check())
                                    @elseif(Auth::user()->username == "ldkhoi97")

                                    <form action="{{ route('add.quantity', $products->id) }}" method="POST">
                                        @csrf
                                        <td><input type="number" class="form-control" max="99999" name="quantity"
                                                placeholder="Qty"></td>

                                        <td><button type="submit" class="btn btn-info btn-circle btn-sm"
                                                onclick='return confirm("Do you want change quantity of product {{ $products->name }} with id {{ $products->id }} ?")'>
                                                <i class="fas fa-plus-circle"></i></button>
                                        </td>
                                    </form>

                                    @endif

                                </tr>
                                <?php $i++ ?>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4" style="height: 880px">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">10 Latest invoice</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p><b style="color: orange">Today have {{ count($todayBills) }} new bills</b></p>
                        <div class="chart-pie pt-4 pb-2">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                                style="font-size: 13.5px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Id Bill</th>
                                        <th>Customer</th>
                                        <th>Date order</th>
                                        <th>Total</th>
                                        <th width='19%'>Bill detail</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($bills as $key => $bills)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $bills->id }}</td>
                                        <td>{{ $bills->customers->name }}</td>
                                        <td>{{ $bills->date_order }}</td>
                                        <td>${{ number_format($bills->total, 2) }}</td>
                                        <td align="center"><a href="{{ route('bills.details', $bills->id) }}"
                                                style="color: white; border-radius: 3px; padding: 3px 7px; background: #7B68EE; font-weight: bold; font-size: 16px">{{ count($bills->bill_detail) }}</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container2"></div>
                            {{-- <p class="highcharts-description">
                                Basic line chart showing trends in a dataset. This chart includes the
                                <code>series-label</code> module, which adds a label to each line for
                                enhanced readability.
                            </p> --}}
                        </figure>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Chart every month</h6>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            {{-- <p class="highcharts-description">
                                Basic line chart showing trends in a dataset. This chart includes the
                                <code>series-label</code> module, which adds a label to each line for
                                enhanced readability.
                            </p> --}}
                        </figure>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span>
                        </h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <!-- Color System -->
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                Primary
                                <div class="text-white-50 small">#4e73df</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-success text-white shadow">
                            <div class="card-body">
                                Success
                                <div class="text-white-50 small">#1cc88a</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                Info
                                <div class="text-white-50 small">#36b9cc</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Warning
                                <div class="text-white-50 small">#f6c23e</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body">
                                Danger
                                <div class="text-white-50 small">#e74a3b</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card bg-secondary text-white shadow">
                            <div class="card-body">
                                Secondary
                                <div class="text-white-50 small">#858796</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                src="sb-admin-2/img/undraw_posting_photo.svg" alt="">
                        </div>
                        <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank"
                                rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                            constantly updated collection of beautiful svg images that you can use
                            completely
                            free and without attribution!</p>
                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations
                            on
                            unDraw &rarr;</a>
                    </div>
                </div>

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                    </div>
                    <div class="card-body">
                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                            CSS bloat and poor page performance. Custom CSS classes are used to create
                            custom components and custom utility classes.</p>
                        <p class="mb-0">Before working with this theme, you should become familiar with the
                            Bootstrap framework, especially the utility classes.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection

@push('chart-js')
<script src="js/highcharts.js"></script>
<script src="js/modules/series-label.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/modules/export-data.js"></script>
<script src="js/modules/accessibility.js"></script>
<script>
    let x = new Array();
     x[0] = {{ $month[0] }}
     x[1] = {{ $month[1] }}
     x[2] = {{ $month[2] }}
     x[3] = {{ $month[3] }}
     x[4] = {{ $month[4] }}
     x[5] = {{ $month[5] }}
     x[6] = {{ $month[6] }}
     x[7] = {{ $month[7] }}
     x[8] = {{ $month[8] }}
     x[9] = {{ $month[9] }}
     x[10] = {{ $month[10] }}
     x[11] = {{ $month[11] }}
    
    Highcharts.chart('container', {
        title: {
            text: 'Statistics growth by month of each year'
        },
        yAxis: {
            title: {
                text: 'Money earned $'
            }
        },
        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 1 to 12'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 1
            }
        },
        series: [{
            name: 'Earn money $',
            data: [ x[0], x[1], x[2], x[3], x[4], x[5], x[6], x[7], x[8], x[9], x[10], x[11] ]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<script>
    let y = new Array();
    // for(i = 0; i < 11, i++){
    y[0] = {{ $day[0] }}
    y[1] = {{ $day[1] }}
    y[2] = {{ $day[2] }}
    y[3] = {{ $day[3] }}
    y[4] = {{ $day[4] }}
    y[5] = {{ $day[5] }}
    y[6] = {{ $day[6] }}
    y[7] = {{ $day[7] }}
    y[8] = {{ $day[8] }}
    y[9] = {{ $day[9] }}
    y[10] = {{ $day[10] }}
    y[11] = {{ $day[11] }}
    y[12] = {{ $day[12] }}
    y[13] = {{ $day[13] }}
    y[14] = {{ $day[14] }}
    y[15] = {{ $day[15] }}
    y[16] = {{ $day[16] }}
    y[17] = {{ $day[17] }}
    y[18] = {{ $day[18] }}
    y[19] = {{ $day[19] }}
    y[20] = {{ $day[20] }}
    y[21] = {{ $day[21] }}
    y[22] = {{ $day[22] }}
    y[23] = {{ $day[23] }}
    y[24] = {{ $day[24] }}
    y[25] = {{ $day[25] }}
    y[26] = {{ $day[26] }}
    y[27] = {{ $day[27] }}
    y[28] = {{ $day[28] }}
    y[29] = {{ $day[29] }}
    y[30] = {{ $day[30] }}

    Highcharts.chart('container2', {
        title: {
            text: 'Statistics growth by date of each month'
        },
        yAxis: {
            title: {
                text: 'Money earned $'
            }
        },
        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 1 to 12'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 1
            }
        },
        series: [{
            name: 'Earn money $',
            data: [ y[0], y[1], y[2], y[3], y[4], y[5], y[6], y[7], y[8], y[9], y[10], y[11], y[12], y[13], y[14], y[15], y[16], y[17], y[18], y[19], y[20], y[21], y[22], y[23], y[24], y[25], y[26], y[27], y[28], y[29], y[30]]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endpush