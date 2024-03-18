<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
        </div>
        <form class="edit-form" action="{{route('admin.products.edit',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-8">
                    <div class="col-sm-6 form-group">
                        <label>Product name</label>
                        <input class="form-control" type="text" value="{{$product->name}}" name="name">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Product code</label>
                        <input class="form-control" type="text" value="{{$product->code}}" name="code">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Product price</label>
                        <input class="form-control" type="text" value="{{$product->price}}" name="price">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Product brand</label>
                        <input class="form-control" type="text" value="{{$product->brand}}" name="brand">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Product weight</label>
                        <input class="form-control" type="text" value="{{$product->weight}}" name="weight">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Gold suisse</label>
                        <input class="form-control" type="text" value="{{$product->suisse}}" name="suisse">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Brief description</label>
                        <textarea class="form-control" name="brief">{{$product->brief}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/products/'.$product->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">Please click on image to change it</div>
                        <div class="text-danger text-center">Image size should be: 264 * 264</div>
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>