<h2>Hey, You have a new order </h2>
<br>
<strong>Order details: </strong><br>
<strong>Customer Name: </strong>{{ $data->customer_name }} <br>
<strong>Customer Email: </strong>{{ $data->customer_email }} <br>
<strong>Customer Phone: </strong>{{ $data->customer_phone }} <br>
{{-- <strong>Service Name: </strong>{{ $data->services->service_name }} <br>
<strong>Package Name: </strong>{{ $data->packages->package_name }} <br> --}}

<strong>Order Id: </strong>{{ $data->id }} <br><br>
<strong>Total Price: </strong>{{ $data->total_price }}$ <br><br>
<strong>Order Date: </strong>{{ $data->created_at }} <br><br>
<strong>Order Full Details Link: </strong><a href="{{ route('admin.order_show',$data->id) }}">order details</a> <br><br>