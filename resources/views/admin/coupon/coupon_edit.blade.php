@extends('admin.master')
@section('title', 'Edit Coupon')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')

@section('content')
<div class="wrapper">

   

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
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
                                <h3 class="box-title col-md-6">Update Cupon</h3>
                                                    <div class="col-md-3"></div>
                                                    <a class="col-md-2 btn btn-primary" href="{{ route('admin.coupon_list') }}">Go TO  Cupon List</a>
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
                                                <form role="form" method="POST" action="{{ route('admin.update_coupon',$coupon->id) }}">
                                                    @csrf
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Customer Name</label>
                                                            <select name="user_id" class="form-control">
                                                                @foreach ($users as $user)
                                                                    <option @if ($user->id==$coupon->user_id)
                                                                        selected
                                                                    else value="{{ $user->id }}" @endif>{{ $user->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Coupon Code</label>
                                                            <input type="text" name="coupon_code" value="{{ $coupon->coupon_code }}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Coupon Type</label>
                                                            <select name="coupon_type" class="form-control">
                                                                <option @if ($coupon->coupon_type=='fixed') selected @else value="fixed" @endif>Fixed</option>
                                                                <option @if ($coupon->coupon_type=='percent') selected @else value="percent" @endif>Percent</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Coupon Value</label>
                                                            <input type="number" name="coupon_value" value="{{ $coupon->coupon_value }}" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Coupon Starting Date</label>
                                                            <input type="date" name="coupon_start_date" value="{{ $coupon->coupon_start_date }}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Coupon Expire Date</label>
                                                            <input type="date" name="coupon_end_date" value="{{ $coupon->coupon_end_date }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
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
