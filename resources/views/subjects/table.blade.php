<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.name')}}</th>
        <th>{{trans('label.description')}}</th>
        <th>{{trans('label.is_active')}}</th>
        <th></th>
    </tr>
    @foreach($subjects as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>
                <a href="{{route('subjects.edit', $row->id)}}" >
                    {{$row->name}}
                </a>
            </td>
            <td>{{$row->description}}</td>
            <td>{{$row->is_active}}</td>

            <td>
                <form style="display: inline" class="form-inline" method="POST"
                      action="{{route('subjects.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-xs btn-danger destroyBtn"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$subjects->links()}}
</div>
