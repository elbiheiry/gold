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
    @foreach($countries as $index => $country)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="country_id[]" value="{{$country->id}}" id="check{{$country->id}}">
                    <label for="check{{$country->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$country->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.cities',['id' => $country->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-map-marker"></i>
                    Cities
                </a>
                <button type="button" data-url="{{route('admin.countries.info',['id' => $country->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>