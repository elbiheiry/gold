<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th>
            <div class="radio-wrap">
                <input type="checkbox" class="checkall" id="checkall">
                <label for="checkall"></label>
            </div>
        </th>
        <th class="text-center">#</th>
        <th class="text-center">Product name</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $index => $product)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="product_id[]" value="{{$product->id}}" id="check{{$product->id}}">
                    <label for="check{{$product->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$product->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.products.images',['id' => $product->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-image"></i>
                    Images
                </a>
                <button type="button" data-url="{{route('admin.products.info',['id' => $product->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>