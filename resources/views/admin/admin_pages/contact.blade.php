@extends('admin.master')
@section('title', 'Contact List')
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
                            <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
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
                                <h3 class="card-title col-lg-4">Contact List</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Service Name</th>
                                            <th>Message</th>
                                            <th>Recive Time</th>
                                            <th>View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                        @if ($contact->is_read==0)
                                        <tr class="font-weight-bold">
                                            <td class="font-weight-bold">{{ $contact->name }}</td>
                                            <td class="font-weight-bold">{{ $contact->email }}</td>
                                            <td class="font-weight-bold">{{ $contact->phone }}</td>

                                            <td class="font-weight-bold">{{ $contact->service_name }}</td>


                                            <td class="font-weight-bold">@php
                                                $content=stripslashes($contact->message);

                                                if (strlen($content) > 15)
                                                $content = substr($content, 0, 15) . '...';

                                                echo $content;
                                                @endphp</td>
                                            <td class="font-weight-bold">
                                                {{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y h:i a') }}
                                            </td>
                                            <td class="font-weight-bold">
                                                @if ($contact->is_read==0)
                                                <form action="{{ route('contact_read',$contact->id) }}" method="post">
                                                    @csrf

                                                    <input type="text" hidden name="is_read" id="" value="1">
                                                    <button class="btn btn-primary" type="submit"> <a
                                                            class="text-white "
                                                            href="{{ route('contact_show', $contact->id) }}">
                                                            <i class="fas fa-envelope"></i></a></button>

                                                </form>
                                                @else
                                                <a class="text-white btn btn-primary"
                                                    href="{{ route('contact_show', $contact->id) }}"><i
                                                        class="fas fa-envelope-open"></i></a>
                                                @endif
                                            </td>




                                            <td>
                                                <a href="{{ route('admin.contact_delete', $contact->id) }}"
                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>


                                        </tr>
                                        @else

                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>

                                            <td>{{ $contact->service_name }}</td>


                                            <td>@php
                                                $content=stripslashes($contact->message);

                                                if (strlen($content) > 15)
                                                $content = substr($content, 0, 15) . '...';

                                                echo $content;
                                                @endphp</td>
                                            <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y h:i a') }}</td>
                                            <td>
                                                @if ($contact->is_read==0)
                                                <form action="{{ route('contact_read',$contact->id) }}" method="post">
                                                    @csrf

                                                    <input type="text" hidden name="is_read" id="" value="1">
                                                    <button class="btn btn-primary" type="submit"> <a
                                                            class="text-white "
                                                            href="{{ route('contact_show', $contact->id) }}">
                                                            <i class="fas fa-envelope"></i></a></button>

                                                </form>
                                                @else
                                                <a class="text-white btn btn-primary"
                                                    href="{{ route('contact_show', $contact->id) }}"><i
                                                        class="fas fa-envelope-open"></i></a>
                                                @endif
                                            </td>




                                            <td>
                                                <a href="{{ route('admin.contact_delete', $contact->id) }}"
                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>


                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Service Name</th>
                                            <th>Message</th>
                                            <th>Recive Time</th>
                                            <th>View</th>

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
            
          });
        });
</script>
@endsection