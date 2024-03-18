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
        <th class="text-center">Image</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sliders as $index => $slider)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="image_id[]" value="{{$slider->id}}" id="check{{$slider->id}}">
                    <label for="check{{$slider->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td><img src="{{asset('storage/uploads/sliders/'.$slider->image)}}" class="table-img"></td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.group.sliders.info',['id' => $slider->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>