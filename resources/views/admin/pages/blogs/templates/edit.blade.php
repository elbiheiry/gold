<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit blog</h5>
        </div>
        <form class="edit-form" action="{{route('admin.blogs.edit',['id' => $blog->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-8">
                    <div class="col-sm-6 form-group">
                        <label>blog name</label>
                        <input class="form-control" type="text" value="{{$blog->name}}" name="name">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>First description</label>
                        <textarea class="form-control" name="description1">{{$blog->description1}}</textarea>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Second description</label>
                        <textarea class="form-control" name="description2">{{$blog->description2}}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/blogs/'.$blog->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">Please click on image to change it</div>
                        <div class="text-danger text-center">Image size should be: 800 * 300</div>
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>