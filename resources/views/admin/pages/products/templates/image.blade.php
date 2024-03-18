<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit image data</h5>
        </div>
        <form class="edit-form" action="{{route('admin.products.image.edit',['id' => $product->id , 'key' => $key])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-success hidden SuccessMessage" ></div>
                <div class="alert alert-danger hidden ErrorMessage" ></div>
                {!! csrf_field() !!}

                <div class="col-md-12 form-group ">
                    <label>Image</label>

                    <img src="{{asset('storage/uploads/products/'.$images[$key])}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="image" style="display: none;">
                    <div class="text-danger text-center">Please click on image to change it</div>
                    <div class="text-danger text-center">Image size should be: 264 * 264</div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>