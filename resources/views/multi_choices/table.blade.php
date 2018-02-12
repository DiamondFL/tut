<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.question')}}</th>
        {{--<th>{{trans('label.reply1')}}</th>--}}
        {{--<th>{{trans('label.reply2')}}</th>--}}
        {{--<th>{{trans('label.reply3')}}</th>--}}
        {{--<th>{{trans('label.reply4')}}</th>--}}
        {{--<th>{{trans('label.reply5')}}</th>--}}
        <th>{{trans('label.answer')}}</th>
        <th>{{trans('label.level')}}</th>
        <th>{{trans('label.knowledge')}}</th>
        <th>{{trans('label.professional')}}</th>
        <th></th>
    </tr>
    @foreach($multi_choices as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>
                <a href="{{route('multi_choices.edit', $row->id)}}">
                    {!! $row->question !!}
                  </a>
            </td>
            {{--<td>{{$row->reply1}}</td>--}}
            {{--<td>{{$row->reply2}}</td>--}}
            {{--<td>{{$row->reply3}}</td>--}}
            {{--<td>{{$row->reply4}}</td>--}}
            {{--<td>{{$row->reply5}}</td>--}}
            <td>{{$row->answer}}</td>
            <td>{{$row->level}}</td>
            <td>{{in_array($row->knowledge, KNOWLEDGE_KEY) ? KNOWLEDGE[$row->knowledge] : '' }}</td>
            <td>{{in_array($row->professional, PROFESSIONAL_KEY) ? PROFESSIONAL[$row->professional]: ''}}</td>
            <td>
                <form style="display: inline" class="form-inline" method="POST"
                      action="{{route('multi_choices.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$multi_choices->links()}}
</div>
