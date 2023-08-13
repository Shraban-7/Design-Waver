@extends('admin.master')
@section('title', 'Admin Order Details')
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


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <h3 class="text-center">Contact Details</h3>
                                        </div>
                                        <div class="col-md-6">

                                            <h5 class="text-center"> <a class="card-text mb-6" href="{{ route('admin.contact_list') }}">Go To Contact
                                                List</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Message ID:</h5>
                                            <p>#{{ $contact->id }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Message Sent  Date:</h5>
                                            <p>{{ $contact->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Message Info:</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Name: </strong>{{ $contact->name }}</li>
                                                <li class="list-group-item"><strong>Email: </strong>{{ $contact->email }}</li>
                                                <li class="list-group-item"><strong>Phone: </strong>{{ $contact->phone }}</li>
                                                <li class="list-group-item"><strong>Service Name: </strong>{{ $contact->service_name }}</li>
                                                <li class="list-group-item"><strong>Message: </strong>{{ $contact->message }}</li>
                                                <li class="list-group-item">
                                                    <form action="{{ route('contact_read',$contact->id) }}" method="post">
                                                        @csrf
                                                        <input type="text" hidden name="is_read" id="" value="1">
                                                        @if ($contact->is_read==0)
                                                            
                                                        <button class="btn btn-primary" type="submit">Mark as read</button>
                                                        @endif
                                                    </form>
                                                </li>


                                              
                                            </ul>
                                            
                                        </div>
                                       
                                    </div>
                                   
                                    

                                </div>
                            </div>
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
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
