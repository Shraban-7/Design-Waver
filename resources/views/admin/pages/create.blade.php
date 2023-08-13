@extends('admin.master')

<link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.min.css") }}">
<!-- CodeMirror -->
<link rel="stylesheet" href="{{ asset("plugins/codemirror/codemirror.css") }}">
<link rel="stylesheet" href="{{ asset("plugins/codemirror/theme/monokai.css") }}">
<!-- Include stylesheet -->




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
                        <!-- Custom tabs (Charts with tabs)-->

                        <!-- /.card -->

                        <!-- DIRECT CHAT -->

                        <!--/.direct-chat -->

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="box-title col-md-6">Create Page</h3>
                                                    <div class="col-md-3"></div>
                                                    <a class="col-md-2 btn btn-primary" href="{{ route('admin.page_list') }}">Go TO  Page List</a>
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
                                                <form role="form" method="POST" action="{{ route('admin.add_page') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    {{-- @method('PUT') --}}
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Page Name</label>
                                                            <input type="text" name="page_name"  class="form-control" placeholder="Enter ...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Heading</label>
                                                            <input type="text" name="title"  class="form-control" placeholder="Enter ...">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Upload Banner</label>

                                                            <div class="input-group">
                                                              <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                              </div>
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <div class="form-group">
                                                            <label>Meta Title</label>
                                                            <input type="text" name="meta_title"  class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta Keywords</label>
                                                            <input type="text" name="meta_keywords"  class="form-control"
                                                                >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Meta Description</label>
                                                            <textarea class="form-control"  id="summernote" id="exampleFormControlTextarea1" name="meta_description" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Page Content</label>
                                                            <textarea class="form-control"  id="summernote1" id="exampleFormControlTextarea1" name="content" rows="5"></textarea>
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

<!-- include libraries(jQuery, bootstrap) -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



<!-- Initialize Quill editor -->



<script>





$(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
$(function () {
    // Summernote
    $('#summernote1').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

@endsection
