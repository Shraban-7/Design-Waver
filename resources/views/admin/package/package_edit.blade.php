@extends('admin.master')
@section('title', 'Edit Package')
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
                                <h3 class="box-title col-md-6">Update Pakage</h3>
                                <div class="col-md-3"></div>
                                <a class="col-md-2 btn btn-primary" href="{{ route('admin.page_list') }}">Go TO Pakage
                                    List</a>
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
                                                <!-- form start -->
                                                <form role="form" method="POST"
                                                    action="{{ route('admin.update_package',$package->id) }}">
                                                    @csrf
                                                    <div class="box-body d-flex justify-content-between">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label>Package Name</label>
                                                                <input type="text" name="package_name"
                                                                    value="{{ $package->package_name }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Package Services</label>
                                                                <select name="service_id" class="form-control"
                                                                    id="service">
                                                                    @foreach ($service as $serviceId => $serviceName)
                                                                    <option @if ($package->service_id == $serviceId)
                                                                        selected @endif value="{{ $serviceId }}">{{
                                                                        $serviceName }}</option>

                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Price of Package</label>
                                                                <input type="number" name="package_price"
                                                                    value="{{ $package->package_price }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Offer Price</label>
                                                                <input type="number" name="offer_package_price"
                                                                    value="{{ $package->offer_package_price }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Offer Price Start Date</label>
                                                                <input type="date" name="offer_price_start_date"
                                                                    value="{{ $package->offer_price_start_date }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Offer Price End Date</label>
                                                                <input type="date" name="offer_price_end_date"
                                                                    value="{{ $package->offer_price_end_date }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Home View</label>
                                                                <select name="home_view" class="form-control">
                                                                    <option @if ($package->home_view == 0) selected
                                                                        @endif value="0">Home View Off</option>
                                                                    <option @if ($package->home_view == 1) selected
                                                                        @endif value="1">Home View On</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Postion of Package</label>
                                                                <select name="position" class="form-control">
                                                                    <option @if ($package->position == 1) selected
                                                                        @endif value="1">Basic</option>

                                                                    <option @if ($package->position == 2) selected
                                                                        @endif value="2">Standard</option>
                                                                    <option @if ($package->position == 3) selected
                                                                        @endif value="3">Premium</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Delivery time</label>
                                                                <input type="text" name="delivery_time"
                                                                    value="{{ $package->delivery_time }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Package Status</label>
                                                                <select name="package_status" class="form-control">
                                                                    <option @if ($package->package_status == 'active') selected
                                                                        @endif value="active">Active</option>
                                                                    <option @if ($package->package_status == 'inactive') selected
                                                                        @endif value="inactive">In Active</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="form-label">Choose Attributes</label>



                                                                <br>
                                                                @foreach ($attributes as $attribute)

                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="attribute_id[]"
                                                                        @if(in_array($attribute->id,$package->attributes->pluck('id')->toArray()))
                                                                        checked
                                                                        @endif
                                                                        value="{{ $attribute->id }}"
                                                                        >
                                                                        {{ $attribute->attribute_name }}
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                                {{-- <div id="attributes">Select service first</div>
                                                                --}}
                                                            </div>
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

<script src="{{ asset(" plugins/jquery/jquery.min.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#service').on('change', function() {
            var service_id = this.value;
            $('#attributes').html(''); // clear old values
            $.ajax({
                url: "{{ route('admin.service.attributes') }}",
                type: "POST",
                data: {
                    service_id: service_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    if (result.attributes.length == 0) {
                        $('#attributes').append(
                            '<div class="checkbox me-2"><label>No Attributes found for selected service</label></div>'
                        );
                    }

                    $.each(result.attributes, function(key, value) {
                        $('#attributes').append(
                            '<div class="checkbox"><label class="checkbox-inline d-inline-flex"><input class="checkbox mx-2" type="checkbox" name="attribute_id[]" value="' +
                            key + '">' + value +
                            '</label></div>');
                    });
                }
            });
        });
    });
</script>
@endsection
