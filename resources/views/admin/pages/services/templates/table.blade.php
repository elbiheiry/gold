<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $index => $service)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$service->title}}</td>
            <td class="text-center">
                <a href="{{route('admin.questions',['id' => $service->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-question"></i>
                    FAQ
                </a>
                <button type="button" data-url="{{route('admin.services.info',['id' => $service->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>