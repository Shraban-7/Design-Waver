@extends('admin.master')
@section('title', 'Edit Service')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')


<link rel="stylesheet" href="{{ asset('admin/richtexteditor/rte_theme_default.css') }}" />
<script type="text/javascript" src="{{ asset('admin/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/richtexteditor/plugins/all_plugins.js') }}"></script>


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
                                <h3 class="box-title col-md-6">Update Service</h3>
                                                    <div class="col-md-3"></div>
                                                    <a class="col-md-2 btn btn-primary" href="{{ route('admin.service_list') }}">Go TO Service List</a>
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
                                                <form role="form" method="POST" action="{{ route('admin.update_service',$service->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Service Name</label>
                                                            <input type="text" name="service_name" value="{{ $service->service_name }}" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Upload Banner</label>
                                                            <div class="m-3">
                                                                <img style="width: 100px" src="{{ asset("images/service/service_banner/$service->service_banner") }}" alt="">
                                                            </div>
                                                            <div class="input-group">
                                                              <div class="custom-file">
                                                                <input type="file"  name="service_banner" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                              </div>
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <div class="form-group">
                                                            <label>Service Title</label>
                                                            <input type="text" name="service_title" value="{{ $service->service_title }}" class="form-control"
                                                                placeholder="Enter Service Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Upload Servce Image</label>
                                                            <div class="m-3">
                                                                <img style="width: 100px" src="{{ asset("images/service/service_image/$service->service_image") }}" alt="">
                                                            </div>
                                                            <div class="input-group">
                                                              <div class="custom-file">
                                                                <input type="file" name="service_image" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                              </div>
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Service Description</label>
                                                            <textarea class="form-control" id="service_desc" id="exampleFormControlTextarea1" name="service_description" rows="3">{{ $service->service_description }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Service Process</label>
                                                            <input type="text" name="service_process" value="{{ $service->service_process }}" class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Service Status</label>
                                                            <select name="service_status" class="form-control">
                                                                <option @if ($service->service_status == 'active') selected
                                                                    @endif value="active">Active</option>
                                                                <option @if ($service->service_status == 'inactive') selected
                                                                    @endif value="inactive">In Active</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Completed project</label>
                                                            <input type="text" name="project" value="{{ $service->project }}" class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Service Clients</label>
                                                            <input type="text" name="client" value="{{ $service->client }}" class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Service review</label>
                                                            <input type="text" name="review" value="{{ $service->review }}" class="form-control"
                                                               >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta Title</label>
                                                            <input type="text" name="meta_title" value="{{ $service->meta_title }}" class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta Keywords</label>
                                                            <input type="text" name="meta_keywords" value="{{ $service->meta_keywords }}" class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Meta Description</label>
                                                            <textarea class="form-control" id="summernote1" id="exampleFormControlTextarea1" name="meta_description" rows="3">{{ $service->meta_description }}</textarea>
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    var editor1 = new RichTextEditor("#service_desc");
    var editor2 = new RichTextEditor("#summernote1");

</script>
@endsection
