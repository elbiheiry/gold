<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
        </div>
        <form class="edit-form" action="{{route('admin.users.edit',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" value="{{$user->name}}" name="name">
                </div>

                <div class="col-sm-6 form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" value="{{$user->email}}" name="email">
                </div>

                <div class="col-sm-6 form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
            </div>

            <div class="spacer-15"></div>
            <div class="col-sm-12 save-btn">
                <button class="custom-btn green-bc" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>