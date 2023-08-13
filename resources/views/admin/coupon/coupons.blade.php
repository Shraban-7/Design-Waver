@extends('admin.master')
@section('title', 'Coupon List')
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
                <div class="mb-2 row">
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

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-lg-4">Cupon List</h3>
                                <div class="col-lg-5"></div>
                                <a class="btn btn-primary col-lg-3" href="{{ route('admin.add_coupon') }}">Add Cupons</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table p-6 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Coupon Type</th>
                                            <th scope="col">Coupon Value</th>

                                            <th scope="col">Coupon Start Date</th>
                                            <th scope="col">Coupon Expire Date</th>
                                          
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->user->name }}</td>
                                                <td>{{ $coupon->coupon_code }}</td>
                                                <td>{{ $coupon->coupon_type }}</td>
                                                <td>{{ $coupon->coupon_value }}</td>

                                                <td>{{ $coupon->coupon_start_date }}</td>
                                                <td>{{ $coupon->coupon_end_date }}</td>
                                             
                                                <td class="d-flex">
                                                    <a class="mx-2 btn btn-success"
                                                        href="{{ route('admin.edit_coupon', $coupon->id) }}"><i class="fas fa-edit"></i></a>
                                                    <a class="mx-2 btn btn-danger"
                                                        href="{{ route('admin.delete_coupon', $coupon->id) }}"><i class="fas fa-trash-alt"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

<!-- /.row -->


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
           
          });
        });
</script>
@endsection
