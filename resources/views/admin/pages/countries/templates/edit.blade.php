<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{$country->name}}</h5>
        </div>
        <form class="edit-form" action="{{route('admin.countries.edit',['id' => $country->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-md-12">
                    <input type="text" name="name" class="form-control" value="{{$country->name}}">
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>