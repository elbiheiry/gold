<div class="spacer-15"></div>
<div class="widget">
    <div class="widget-content">
        <div class="spacer-15"></div>
        <div class="table-responsive">
            <table id="datatable"  class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Created at</th>
                    <th>Order</th>
                </tr>
                </thead>
                <tbody>
                @foreach($checkouts as $index => $checkout)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$checkout->member['name']}}</td>
                        <td>{{$checkout->last_name}}</td>
                        <td>{{$checkout->member['email']}}</td>
                        <td>{{$checkout->phone}}</td>
                        <td>{{$checkout->country['name']}}</td>
                        <td>{{$checkout->city['name']}}</td>
                        <td>{{$checkout->address}}</td>
                        <td>{{$checkout->total}}</td>
                        <td>{{$checkout->created_at->format('Y-m-d')}}</td>
                        <td class="text-center">
                            <a href="{{route('admin.checkouts.orders',['id' => $checkout->id])}}" class="icon-btn green-bc">
                                <i class="fa fa-info"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>