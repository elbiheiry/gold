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
        <th class="text-center">Name</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cities as $index => $city)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="city_id[]" value="{{$city->id}}" id="check{{$city->id}}">
                    <label for="check{{$city->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$city->name}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.cities.info',['id' => $city->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>