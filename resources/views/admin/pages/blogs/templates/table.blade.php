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
        <th class="text-center">blog name</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($blogs as $index => $blog)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="blog_id[]" value="{{$blog->id}}" id="check{{$blog->id}}">
                    <label for="check{{$blog->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$blog->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.blogs.images',['id' => $blog->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-image"></i>
                    Images
                </a>
                <button type="button" data-url="{{route('admin.blogs.info',['id' => $blog->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>