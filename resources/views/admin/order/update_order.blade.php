@extends('admin.master')
@section('title', 'Admin Edit Order')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('content')
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
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">

                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="box-title col-md-6">Update Order</h3>
                                <div class="col-md-3"></div>
                                <a class="col-md-2 btn btn-primary" href="{{ route('admin.order_list') }}">Go TO Order
                                    List</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">

                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <p><strong>Opps Something went wrong</strong></p>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                <!-- form start -->
                                                <form role="form" method="POST"
                                                    action="{{ route('admin.order_edit',$order->id) }}">
                                                    @csrf
                                                    <div class="box-body">

                                                        <table class="table p-6 table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Service Name</th>
                                                                    <th scope="col">Package Name</th>
                                                                    <th scope="col">Package Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($order->order_packages as $data)
                                                                <tr>
                                                                    <td>{{ $data->services->service_name }}</td>
                                                                    <td>{{ $data->packages->package_name }}</td>
                                                                    <td>
                                                                        {{ $data->packages->package_price }}
                                                                    </td>

                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="box-body">

                                                        <div class="form-group">
                                                            <label>Customer Name</label>
                                                            <input type="text" name="customer_name" class="form-control"
                                                                value="{{ $order->customer_name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Customer Email</label>
                                                            <input type="email" name="customer_email"
                                                                class="form-control"
                                                                value="{{ $order->customer_email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Customer Phone</label>
                                                            <input type="text" name="customer_phone"
                                                                class="form-control"
                                                                value="{{ $order->customer_phone }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Total Price</label>
                                                            <input type="text" name="total_price" class="form-control"
                                                                value="{{ $order->total_price }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Work Status</label>
                                                            <select name="work_status" class="form-control">
                                                                <option @if ($order->work_status == "pending") selected
                                                                    @endif value="pending">Pending</option>
                                                                <option @if ($order->work_status == "processing") selected
                                                                    @endif value="processing">Processing</option>
                                                                <option @if ($order->work_status == "completed") selected
                                                                    @endif value="completed">Completed</option>
                                                                <option @if ($order->work_status == "decline") selected
                                                                    @endif value="decline">Decline</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- /.card-body -->
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
@endsection
