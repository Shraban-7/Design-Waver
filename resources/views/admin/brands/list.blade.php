@extends('admin.master')
@section('title', 'Brand List')
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

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-lg-4">Brand List</h3>
                                <div class="col-lg-5"></div>
                                <a class="btn btn-primary col-lg-3" href="{{ route('brand_create') }}">Add Brand</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">Brand Name</th>
                                            <th class="text-center" scope="col">Brand Logo</th>
                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                <tr>
                                    <td class="text-center">{{ $brand->brand_name }}</td>
                                    <td class="text-center">
                                        <img style="width: 100px" class="img-thumbnail"
                                            src="{{ asset("images/brands/{$brand->brand_logo}") }}"
                                            alt="{{ $brand->brand_name }}">
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{ route('brand_edit', $brand->id) }}"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-danger m-2"
                                            href="{{ route('brand_delete', $brand->id) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center" scope="col">Brand Name</th>
                                            <th class="text-center" scope="col">Brand Logo</th>
                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
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
