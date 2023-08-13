<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->

    <!-- Google Fonts -->

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />

    <title>Invoce </title>

</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: {{ $order->id }}</strong>
                        </p>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <p class="pt-0">Design Waver.com</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span
                                        style="color:#5d9fc5 ;">{{ $order->customer_name }}</span></li>
                                <li class="text-muted">{{ $order->customer_email }}</li>

                                <li class="text-muted"><i class="fas fa-phone"></i> {{ $order->customer_phone }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span>{{ $order->id }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span>{{ $order->created_at }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-warning text-black fw-bold">
                                        @if ($order->status == 0)
                                            Unpaid
                                        @else
                                            Paid
                                        @endif
                                    </span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr class="text-center">

                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($order_packages as $data)
                                    <tr class="text-center">


                                        <td>{{ $data->packages->package_name }}</td>
                                        <td>{{ $data->package_quantity }}</td>
                                        @if ($data->packages->offer_package_price == null)
                                            <td>{{ $data->packages->package_price }}</td>
                                        @else
                                            <td>
                                                <del class="text-3xl">{{ $data->packages->package_price }}</del>
                                                {{ $data->packages->offer_package_price }}
                                            </td>
                                        @endif
                                        <td>{{ $data->packages->package_price * $data->package_quantity }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    <div class="row">

                        <div class="col-xl-9">

                            <p class="text-center">Add additional notes and information</p>



                            @if ($order->requirement_desc != null)
                            <div>
                                {{ $order->requirement_desc  }}
                            </div>
                            @else

                            <div>
                                no requirement required

                            </div>
                            @endif
                            <hr>
                        </div>
                        <div class="col-xl-3">
                            @if ($order->offer_package_price != null)
                                <ul class="list-unstyled">
                                    <li class="text-muted ms-3"><span
                                            class="text-black me-4">Discount</span>{{ $order->offer_package_price }}
                                    </li>

                                </ul>
                            @endif

                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                                    style="font-size: 25px;">{{ $order->total_price }}</span></p>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
</body>

</html>
