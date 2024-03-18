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
        <th class="text-center">title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $index => $question)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="question_id[]" value="{{$question->id}}" id="check{{$question->id}}">
                    <label for="check{{$question->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$question->title}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.questions.info',['id' => $question->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>