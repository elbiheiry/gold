<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit service</h5>
        </div>
        <form class="edit-form" action="{{route('admin.questions.edit',['id' => $question->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="col-sm-12 form-group">
                    <label>Question</label>
                    <input class="form-control" type="text" value="{{$question->title}}" name="title">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Answer</label>
                    <textarea class="form-control" name="description">{{$question->description}}</textarea>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>