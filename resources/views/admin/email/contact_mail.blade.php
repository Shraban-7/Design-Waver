<h2>Hey, It's me {{ $data->name }}</h2>
<br>

<strong>Contact details: </strong><br>
<strong>Name: </strong>{{ $data->name }} <br>
<strong>Email: </strong>{{ $data->email }} <br>
<strong>Phone: </strong>{{ $data->phone }} <br>
<strong>Service Name: </strong>{{ $data->service_name }} <br>
<strong>Message: </strong>{{ $data->message }} <br><br>


<strong>Goto Contact Details: </strong><a href="{{ route('contact_show',$data->id) }}">order details</a> <br><br>

Thank you
