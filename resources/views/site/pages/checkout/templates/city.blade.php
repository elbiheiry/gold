<option value="0">City</option>
@foreach($country->cities as $city)
    <option value="{{$city->id}}">{{$city->name}}</option>
@endforeach