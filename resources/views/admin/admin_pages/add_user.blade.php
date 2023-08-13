@extends('admin.master')
@section('title', 'Add User')
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
                            <div class="card-header">
                                <h3 class="box-title col-md-6">Add User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                <form role="form" method="POST"
                                                    action="{{ route('admin.add_customer') }}">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Username</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="formGroupExampleInput" placeholder="Enter username">
                                                            @error('name')
                                                            <div class="error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Email address</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="exampleFormControlInput1"
                                                                placeholder="name@example.com">
                                                            @error('email')
                                                            <div class="error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput2">Phone Number</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="formGroupExampleInput2"
                                                                placeholder="Enter user phone number">
                                                            @error('phone')
                                                            <div class="error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Role select</label>
                                                            <select class="form-control" name="role"
                                                                id="exampleFormControlSelect1">
                                                                <option value="admin">Admin</option>
                                                                <option selected value="user">Customer</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Status select</label>
                                                            <select class="form-control" name="status"
                                                                id="exampleFormControlSelect1">
                                                                <option selected value="active">Active</option>
                                                                <option value="inactive">InActive</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPassword4">Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                id="inputPassword4" placeholder="Password">
                                                            @error('password')
                                                            <div class="error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPassword4">Confirm Password</label>
                                                            <input type="password" class="form-control"
                                                                name="password_confirmation" id="inputPassword4"
                                                                placeholder="Password">
                                                            @error('password_confirmation')
                                                            <div class="error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </div>
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
