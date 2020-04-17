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

{{-- Time ago --}}
@include('php.time-ago')

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('partials.message')

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings (Year)</div>
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
                                <a class="dropdown-item" href="{{ route('customers.index') }}">Customer</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('categories.index') }}">Categories Products</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" id="tablesave">
                        <p style="color:orange; font-size:16px; font-weight: bold">
                            <span style="color:#8B0000;">Out of stock: {{ $outOfStock }} </span><br>
                            Out of stock soon: {{ $leftQuantity }}</p>
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
                                                style="color: #b2b2b2; font-size: 11px; float: right">{{ $products->categories->name }}
                                                - {{ $products->objects->name }}</span></b>
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

                                    <td><input type="number" class="form-control" max="99999"
                                            id="quantity{{ $products->id }}" name="quantity" placeholder="Qty"></td>

                                    <td class="addquantity">
                                        <a href="javascript:void(0);" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-plus-circle fa-lg" data-id="{{ $products->id }}"></i>
                                        </a>
                                    </td>

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
                <div class="card shadow mb-4" style="height: 1071px">
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
                                <div class="dropdown-header">Bills:</div>
                                <a class="dropdown-item" href="{{ route('bills.index') }}">Bills</a>
                                <a class="dropdown-item" href="{{ route('coupons.index') }}">Coupons</a>
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
                                        <td>{{ $bills->date_order }} <br>
                                            <span
                                                style="color: #b2b2b2; font-size: 10px; font-weight: bold; float: right">{{ time_elapsed_string($bills->date_order) }}</span>
                                        </td>
                                        <td>${{ number_format($bills->total, 2) }}</td>
                                        <td align="center"><a href="{{ route('bills.details', $bills->id) }}"
                                                style="color: white; border-radius: 3px; padding: 3px 7px; background: #7B68EE; font-weight: bold; font-size: 16px">{{ count($bills->bill_detail) }}</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Chart everyday</h6>
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
                <!-- Chart -->
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

            <div class="col-lg-4 mb-4">

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection

@push('chart-js')
<script>
    //Save Cart
    $("#tablesave").on("click", ".addquantity i", function(){
        var y = $(this).data("id");
        var x = document.getElementById("quantity" + $(this).data("id")).value;
        $.ajax({
            url : '/add/quantity/'+ y + '/'+ x,
            type : 'GET',
        }).done(function(response){
            if(response.status == "error") {
                toastr.warning(response.msg);
            } else {
                $("#tablesave").empty();
                $("#tablesave").html(response);   
                $('#dataTable').DataTable();
                toastr.success("Update this product success");
            }  
        });
    });
</script>
<script src="js/highcharts.js"></script>
<script src="js/series-label.js"></script>
<script src="js/exporting.js"></script>
<script src="js/export-data.js"></script>
<script src="js/accessibility.js"></script>
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
            text: 'Monthly chart of the year ' + "{{ date('Y') }}"
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
        },
        ],
        
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
            text: "Daily chart of the month " + "{{ date('m') }}"
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