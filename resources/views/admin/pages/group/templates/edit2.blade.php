<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>
        </div>
        <form class="edit-form" action="{{route('admin.group.company.edit',['id' => $slider->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-12">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/companies/'.$slider->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">Please click on image to change it</div>
                        <div class="text-danger text-center">Image size should be: 240 * 146</div>
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>