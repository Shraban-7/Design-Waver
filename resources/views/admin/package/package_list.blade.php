@extends('admin.master')
@section('title', 'Package List')
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
                        <!-- Custom tabs (Charts with tabs)-->

                        <!-- /.card -->

                        <!-- DIRECT CHAT -->

                        <!--/.direct-chat -->

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-lg-4">Package List</h3>
                                <div class="col-lg-5"></div>
                                <a class="btn btn-primary col-lg-3" href="{{ route('admin.add_package') }}">Add Package</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Package Service</th>
                                            <th scope="col">Package Attributes</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($packages as $package)
                                        <tr>
                                            <td>{{ $package->package_name }}</td>
                                            <td>{{ $package->service->service_name }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($package->attributes as $attribute)
                                                    <li>{{ $attribute->attribute_name }}</li>
                                                    @endforeach
                                                </ol>

                                            </td>
                                            <td>{{ $package->package_price }}</td>
                                            <td>{{ $package->package_status }}</td>
                                            <td>
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.edit_package', $package->id) }}"><i class="fas fa-edit"></i></a>

                                                <a class="btn btn-primary"
                                                    href="{{URL::route('service_package_details', [$package->service->slug,$package->id] )}}"><i class="fas fa-link"></i></a>

                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.delete_package', $package->id) }}"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Package Service</th>
                                            <th scope="col">Package Attributes</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>

                                            <th scope="col">Action</th>
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
