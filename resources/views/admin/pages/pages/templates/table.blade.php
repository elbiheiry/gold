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
        <th class="text-center">page name</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $index => $page)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="page_id[]" value="{{$page->id}}" id="check{{$page->id}}">
                    <label for="check{{$page->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$page->name}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.pages.info',['id' => $page->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>