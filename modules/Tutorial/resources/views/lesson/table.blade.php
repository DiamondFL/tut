<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.title')}}</th>
        <th>{{trans('label.section_id')}}</th>
        <th>{{trans('label.views')}}</th>
        <th>{{trans('label.last_view')}}</th>
        <th>{{trans('label.created_by')}}</th>
        <th>{{trans('label.updated_by')}}</th>
        <th>{{trans('label.is_active')}}</th>
        <th></th>
    </tr>
    @foreach($lessons as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>{{$row->title}}</td>
            <td>{{$row->section_id}}</td>
            <td>{{$row->views}}</td>
            <td>{{$row->last_view}}</td>
            <td>{{$row->created_by}}</td>
            <td>{{$row->updated_by}}</td>
            <td>{{$row->is_active}}</td>
            <td>
                <form method="POST" action="{{route('lesson.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="{{route('lesson.edit', $row->id)}}" class="btn btn-info btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('lesson.show', $row->id)}}" class="btn btn-info btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="" class="btn btn-primary btn-xs"><i class="fa fa-question-circle"></i></a>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$lessons->links()}}
</div>
