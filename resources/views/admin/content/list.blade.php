@extends('admin.master')

@section('content')
<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header row">
                        <h3 class="box-title col-md-3">Brands List</h3>
                        <div class="col-md-6"></div>
                        <a class="btn btn-primary" class="col-md-2" href="{{ route('brand_create') }}">Add New Brand</a>
                    </div>
                    <!-- /.box-header -->
                    <table id="example2" style="margin:15px; padding:15px"
                        class="table p-6 m-6 text-center table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Logo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        <img style="width: 100px" class="img-thumbnail"
                                            src="{{ asset("images/brands/{$brand->brand_logo}") }}"
                                            alt="{{ $brand->brand_name }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('brand_edit', $brand->id) }}">Edit</a>
                                        <br><br>
                                        <a class="m-2 btn btn-danger"
                                            href="{{ route('brand_delete', $brand->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                // "url":"{{ route('admin.contact_list') }}"
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
