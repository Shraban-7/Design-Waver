@extends('admin.master')


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
                                <h3 class="card-title col-lg-3">All Page List</h3>
                              
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Page Name</th>

                                            <th scope="col">Page Title</th>
                                            <th scope="col">Page Banner</th>
                                            <th scope="col">Meta Title</th>
                                            <th scope="col">Meta Keywords</th>
                                            <th scope="col">Meta Description</th>
                                            <th scope="col">Page Content</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $page->page_name }}</td>

                                            <td>{{ $page->title }}</td>
                                            <td>
                                                @if ($page->image)
                                                <img style="width: 150px" class="img-thumbnail" src="{{ asset("images/pages/{$page->image}") }}" alt="">
                                                @else
                                                    <span>No Image</span>
                                                @endif

                                            </td>
                                            <td>{{ $page->meta_title }}</td>
                                            <td>{{ $page->meta_keywords }}</td>
                                            <td>{{ $page->meta_description }}</td>
                                            <td>@php
                                                $content=stripslashes($page->content);

                                                if (strlen($content) > 150)
                                                $content = substr($content, 0, 150) . '...';

                                                echo $content;
                                                @endphp</td>

                                            <td class="d-flex">
                                                <a class="btn btn-success mx-2"
                                                    href="{{ route('admin.edit_page_slug',$page->slug) }}"><i
                                                        class="fas fa-edit"></i></a>

                                                <a class="btn btn-danger mx-2"
                                                    href="{{ route('admin.delete_page',$page->id) }}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Page Name</th>

                                            <th>Page Title</th>
                                            <th>Page Banner</th>
                                            <th>Meta Title</th>
                                            <th>Meta Keywords</th>
                                            <th>Meta Description</th>
                                            <th>Page Content</th>
                                            <th>Action</th>
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
          })
        });
</script>
@endsection
