@extends('admin.master')
@section('title', 'Admin Order Details')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('content')


@if ($message = Session::get('alert'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="wrapper">

   

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Order Details</h3>
                                </div>
                                <div class="card-body">
                                    <a class="card-text mb-6" href="{{ route('admin.order_list') }}">go to Order
                                        List</a>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Order ID:</h5>
                                            <p>#{{ $order->id }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Order Date:</h5>
                                            <p>{{ $order->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Customer Info:</h5>
                                            <p>Name: {{ $order->customer_name }}<br>
                                                Email: {{ $order->customer_email }}<br>
                                                Phone: {{ $order->customer_phone }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Delivery Info:</h5>

                                            @php
                                            $start_date = \Carbon\Carbon::parse($order->created_at);
                                            $deliveryTimeInDays = $package->delivery_time;
                                            $expire_date =
                                            $start_date->copy()->addDays($deliveryTimeInDays);

                                            $remaining = $expire_date->diff(\Carbon\Carbon::now());
                                            $daysLeft = $remaining->d;
                                            $hoursLeft = $remaining->h;

                                            $current_date = \Carbon\Carbon::now();
                                            @endphp

                                            <td>
                                                @if ($expire_date <= $current_date) <span>
                                                    Order Delivery Time expired
                                                    </span>
                                                    @else
                                                    <span>
                                                        @if ($daysLeft > 0)
                                                        {{ $daysLeft }} day{{ $daysLeft > 1 ? 's' :
                                                        '' }}
                                                        @endif

                                                        @if ($hoursLeft > 0)
                                                        {{ $hoursLeft }} hour{{ $hoursLeft > 1 ? 's'
                                                        : '' }}
                                                        @endif

                                                        left
                                                    </span>
                                                    @endif
                                            </td>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Order Items:</h5>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Service Name</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Package Price (orginal)</th>
                                                        <th class="text-center">Package Price (Discounted)</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order_packages as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $item->services->service_name }}</td>
                                                        <td class="text-center">{{ $item->package_quantity }}</td>
                                                        <td class="text-center">{{ $item->main_price }}$</td>
                                                        <td class="text-center">{{ $item->package_price }}$</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-right">Subtotal:</td>
                                                        <td>${{ $order->total_price }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3" class="text-right">Total:</td>
                                                        <td>${{ $order->total_price }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="card">
                                                <h5 class="card-header">Requirement Description:</h5>
                                                <div class="card-body">
                                                    @if ($order->requirement_desc)
                                                    <p>
                                                        {{ $order->requirement_desc }}
                                                    </p>
                                                    @else
                                                    <span class="text-danger py-4 px-6">No Requirement
                                                        description</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <h5 class="card-header">Requirement File:</h5>
                                                <div class="card-body">
                                                    @if ($order->requirement_file != '')
                                                    <a class="btn btn-success"
                                                        href="{{ route('admin.order_file_download', $order->id) }}">Download</a>
                                                    @else
                                                    <span class="text-danger py-4 px-6">No File</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </section>

        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div>

<!-- /.row -->


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
