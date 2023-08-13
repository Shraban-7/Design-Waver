@extends('admin.master')
@section('title', 'Add Portfolio')
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
                                <h3 class="box-title col-md-6">Create Portfolio</h3>
                                                    <div class="col-md-3"></div>
                                                    <a class="col-md-2 btn btn-primary" href="{{ route('admin.portfolio_list') }}">Go TO  Portfolio List</a>
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
                                                <form role="form" method="POST" action="{{ route('admin.add_portfolio') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">Upload Portfolio</label>
                                                                <div class="input-group">
                                                                  <div class="custom-file">
                                                                    <input type="file" name="portfolio_image" class="custom-file-input" id="exampleInputFile">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                  </div>
                                                                  <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            <div class="form-group">
                                                                <label>Services</label>
                                                                <select name="service_id" class="form-control" id="service">
                                                                    @foreach ($services as $serviceId => $serviceName)
                                                                        <option value="{{ $serviceId }}">{{ $serviceName }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>

                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->



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
