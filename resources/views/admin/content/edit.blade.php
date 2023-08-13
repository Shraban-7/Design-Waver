@extends('admin.master')
@section('title', 'Edit Why Choose Us')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('content')
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
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">

                        <div class="card">
                            <div class="card-header ">
                                <h3 class="box-title col-md-6">Update Content</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <div class="box-header with-border row">

                                                </div>
                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                <form role="form" method="POST" action="{{ route('content_update', $homeContent) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="box-body">
                                                    @if ($homeContent->header=='contact us')
                                                    <div class="form-group d-none">
                                                        <label>Content title</label>
                                                        <input type="text" name="header" class="form-control"
                                                            value="{{ $homeContent->header }}">
                                                    </div>
                                                    <div class="form-group d-none">
                                                        <label>Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $homeContent->title }}">
                                                    </div>

                                                    @else
                                                    <div class="form-group">
                                                        <label>Content title</label>
                                                        <input type="text" name="header" class="form-control"
                                                            value="{{ $homeContent->header }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $homeContent->title }}">
                                                    </div>
                                                    @endif
                                                    @if ($homeContent->header=='contact us')


                                                    @else
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Upload Banner</label>
                                                        <div class="m-3">
                                                            <img style="width: 100px" class="img-thumbnail"
                                    src="{{ asset("images/content/{$homeContent->banner}") }}" alt="no picture">
                                                        </div>
                                                        <div class="input-group">
                                                          <div class="custom-file">
                                                            <input type="file" name="banner" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                          </div>
                                                          <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    @endif


                                                    <div class="form-group">
                                                        <label>Sub Title 1</label>
                                                        <input type="text" name="sub_title1" class="form-control"
                                                            value="{{ $homeContent->sub_title1 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Conetent1</label>
                                                        <input type="text" name="content1" class="form-control"
                                                            value="{{ $homeContent->content1 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sub Title 2</label>
                                                        <input type="text" name="sub_title2" class="form-control"
                                                            value="{{ $homeContent->sub_title2 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Conetent2</label>
                                                        <input type="text" name="content2" class="form-control"
                                                            value="{{ $homeContent->content2 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sub Title 3</label>
                                                        <input type="text" name="sub_title3" class="form-control"
                                                            value="{{ $homeContent->sub_title3 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Conetent3</label>
                                                        <input type="text" name="content3" class="form-control"
                                                            value="{{ $homeContent->content3 }}">
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
                        <div class="card-header">
                            <h3 class="card-title"></h3>
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
