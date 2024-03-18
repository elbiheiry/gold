<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Image</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @if($images != null)
        @foreach($images as $key => $image)
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{asset('storage/uploads/blogs/'.$image)}}" class="table-img"></td>
                <td class="text-center">

                    <button data-url="{{route('admin.blogs.image.info',['id' => $blog->id , 'key' => $key])}}" class="btn-modal-view icon-btn green-bc">
                        <i class="fa fa-pencil"></i>
                        Edit
                    </button>
                    <button data-url="{{route('admin.blogs.delete.image',['id' => $blog->id , 'key' => $key])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                        <i class="fa fa-trash-o"></i>
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>