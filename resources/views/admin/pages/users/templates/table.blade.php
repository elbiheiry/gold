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
        <th class="text-center">name</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $index => $user)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="user_id[]" value="{{$user->id}}" id="check{{$user->id}}">
                    <label for="check{{$user->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$user->name}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.users.info',['id' => $user->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>