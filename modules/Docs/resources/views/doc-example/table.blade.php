<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.title')}}</th>
        <th>{{trans('label.views')}}</th>
        <th>{{trans('label.last_view')}}</th>
        <th>{{trans('label.creator')}}</th>
        <th></th>
    </tr>
    @foreach($docExamples as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>
                <a href="{{route('doc-example.edit', $row->id)}}">
                    {{$row->title}}
                </a>
            </td>
            <td>{{$row->views}}</td>
            <td>{{$row->last_view}}</td>
            <td>{{$row->creatorSelf()}}</td>
            <td>
                <form method="POST" action="{{route('doc-example.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="{{route('doc-example.show', $row->id)}}" class="btn btn-xs btn-default">
                        <i class="fa fa-eye"></i>
                    </a>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$docExamples->links()}}
</div>
