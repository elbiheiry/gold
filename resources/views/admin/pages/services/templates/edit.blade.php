<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit service</h5>
        </div>
        <form class="edit-form" action="{{route('admin.services.edit',['id' => $service->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="col-sm-12 form-group">
                    <label>Service name</label>
                    <input class="form-control" type="text" value="{{$service->title}}" name="title">
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>