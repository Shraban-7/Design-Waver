@extends('admin.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Content</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('content_create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Header</label>
                                <input type="text" name="header" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                    >
                            </div>

                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" name="banner" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Sub Title 1</label>
                                <input type="text" name="sub_title1" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label>Conetent1</label>
                                <input type="text" name="content1" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label>Sub Title 2</label>
                                <input type="text" name="sub_title2" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label>Conetent2</label>
                                <input type="text" name="content2" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label>Sub Title 1</label>
                                <input type="text" name="sub_title3" class="form-control"
                                    >
                            </div>
                            <div class="form-group">
                                <label>Conetent3</label>
                                <input type="text" name="content3" class="form-control"
                                    >
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
@endsection

