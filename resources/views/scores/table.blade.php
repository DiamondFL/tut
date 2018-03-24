<table class="table">
    <tr>
        <th>
            <input type="checkbox" class="check_all">
        </th>
        <th>{{trans('label.user_id')}}</th>
        <th>{{trans('label.score')}}</th>
        <th>{{trans('label.no_answer')}}</th>
        <th>{{trans('label.no_question')}}</th>
        <th></th>
    </tr>
    @foreach($scores as $row)
        <tr>
            <td>
                <input type="checkbox" class="check_item" data="{{$row->id}}">
            </td>
            <td>{{$row->user_id}}</td>
            <td>{{$row->score}}</td>
            <td>{{$row->no_answer}}</td>
            <td>{{$row->no_question}}</td>
            <td>
                <form method="POST" action="{{route('scores.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-xs btn-danger destroyBtn"><i class="fa fa-trash"></i></button>
                    <a href="{{route('scores.edit', $row->id)}}" class="btn btn-xs btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$scores->links()}}
</div>
