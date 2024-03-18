<table id="cart" class="table table-hover table-condensed">
    <thead>
    <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
    </tr>
    </thead>
    @foreach($products as $product)
        <form class="ajax-form" method="post" action="{{route('site.cart.update',['rowId' => $product->rowId])}}">
            {!! csrf_field() !!}
            <tbody>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/uploads/products/'.$product->options['image'])}}" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$product->name}}</h4>
                                <p>{{$product->options['brief']}}</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{$product->price}} AED</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="{{$product->qty}}" name="qty" >
                    </td>
                    <td data-th="Subtotal" class="text-center">{{$product->price * $product->qty}}  AED</td>
                    <td class="actions" data-th="">
                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        <a href="{{route('site.cart.remove' ,['id' => $product->rowId])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            </tbody>
        </form>
    @endforeach
    <tfoot>
    <tr>
        <td><a href="#" class=""></a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center "><strong>price {{\Cart::subtotal()}} AED</strong></td>
        <td><a href="#" class=""></a></td>
    </tr>
    <tr>
        <td><a href="#" class=""></a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center "><strong>Vat. 5 %</strong></td>
        <td><a href="#" class=""></a></td>
    </tr>
    <tr>
        <td><a href="#" class=""></a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center "><strong>shipping 20.00  AED</strong></td>
        <td><a href="#" class=""></a></td>
    </tr>

    <tr>
        <td><a href="#" class=""></a></td>
        <td  class="hidden-xs"></td>
        <td style="    text-align: right;" colspan="2" class="hidden-xs text-center total"><strong>Total {{\Cart::total()}} AED</strong></td>
        <td><a href="#" class=""></a></td>
    </tr>
    <tr>
        <td><a href="{{route('site.products')}}" class="btn btn-warning"> Continue Shopping</a></td>

        <td colspan="3">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="defaultCheckedDisabled2" name="disabledGroupExample" checked disabled>
                <label style="    padding-right: 40px;" class="custom-control-label" for="defaultCheckedDisabled2">Cash when delivery</label>
                <input type="radio" class="custom-control-input" id="defaultUncheckedDisabled2" name="disabledGroupExample" disabled>
                <label class="custom-control-label" for="defaultUncheckedDisabled2">Visa</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
            </div>
            <!-- Default checked disabled -->
        </td>
        <td><a href="{{route('site.checkout')}}" class="btn btn-success btn-block ">Cash when delivery </a></td>
    </tr>
    </tfoot>
</table>