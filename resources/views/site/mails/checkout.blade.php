<!DOCTYPE html>
<html>
    <head>
        <title>New order message</title>

    </head>
    <body>
        <h1>This is a message from : <strong>{{$first_name}} {{$last_name}}</strong></h1>

        <span> Email : {{$useremail}}</span><br>
        <span> Phone : {{$userphone}}</span><br>
        <span> Address : {{$useraddress}}</span><br>
        <span> Country : {{$usercountry}}</span><br>
        <span> City : {{$useraddress}}</span><br>
        <p>To View the order details please visit this link : <a href="{{route('admin.checkouts.orders' ,['id' => $checkoutid])}}">Click here</a> </p>
    </body>

</html>