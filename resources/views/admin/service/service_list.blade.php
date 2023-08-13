@extends('admin.master')
@section('title', 'Service List')
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

    <!-- Preloader -->
  

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
                                <h3 class="card-title col-lg-4">Service List</h3>
                                <div class="col-lg-5"></div>
                                <a class="btn btn-primary col-lg-3" href="{{ route('admin.add_service') }}">Add Service</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Service Banner</th>
                                            <th scope="col">Service Title</th>
                                            <th scope="col">Service Image</th>
                                            <th scope="col">Service Description</th>
                                            <th scope="col">Status</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->service_name }}</td>
                                            <td>
                                                @if ($service->service_banner)
                                                <img style="width: 100px" class="img-thumbnail" src="{{ asset("images/service/service_banner/{$service->service_banner}") }}" alt="{{
                                                $service->service_banner }}">
                                                @else
                                                service banner not provide
                                                @endif

                                            </td>
                                            <td>{{ $service->service_title }}</td>
                                            <td>
                                                <img style="width: 100px" class="img-thumbnail" src="{{ asset("images/service/service_image/{$service->service_image}") }}" alt="{{
                                                $service->service_image }}">
                                            </td>
                                            <td>
                                                @php
                                                $content=stripslashes($service->service_description);

                                                if (strlen($content) > 50)
                                                    $content = substr($content, 0, 40) . '...';

                                                echo $content;
                                                @endphp
                                            </td>
                                            <td>{{ $service->service_status }}</td>


                                            <td class="d-flex ">
                                                    <a class="btn btn-success mx-2"
                                                    href="{{ route('admin.edit_service',$service->id) }}"><i
                                                        class="fas fa-edit"></i></a>

                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.delete_service',$service->id) }}"><i
                                                        class="fas fa-trash-alt"></i></a>




                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Service Banner</th>
                                            <th scope="col">Service Title</th>
                                            <th scope="col">Service Image</th>
                                            <th scope="col">Service Description</th>
                                            <th scope="col">Status</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
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
