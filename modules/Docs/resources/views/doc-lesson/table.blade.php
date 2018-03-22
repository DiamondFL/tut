<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.title')}}</th>
        <th>{{trans('label.sub_category_id')}}</th>
        <th>{{trans('label.views')}}</th>
        <th>{{trans('label.last_view')}}</th>
        <th>{{trans('label.created_by')}}</th>
        <th></th>
    </tr>
    @foreach($docLessons as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>{{$row->title}}</td>
            <td>{{$row->sub_category_id}}</td>
            <td>{{$row->views}}</td>
            <td>{{$row->last_view}}</td>
            <td>{{$row->created_by}}</td>
            <td>
                <form method="POST" action="{{route('doc-lesson.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="{{route('doc-lesson.edit', $row->id)}}" class="btn btn-info btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('doc-lesson.show', $row->id)}}" class="btn btn-info btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$docLessons->links()}}
</div>
