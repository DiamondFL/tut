<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.email')}}</th>
        <th>{{trans('label.phone_number')}}</th>
        <th>{{trans('label.sex')}}</th>
        <th>{{trans('label.active')}}</th>
        <th></th>
    </tr>
    @foreach($users as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>{{$row->email}}</td>
            <td>{{$row->phone_number}}</td>
            <td>{{$row->sex}}</td>
            <td>{{$row->active}}</td>
            <td>
                <form method="POST" action="{{route('users.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="{{route('users.edit', $row->id)}}" class="btn btn-xs btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('users.ban', $row->id)}}" class="btn btn-default btn-xs"
                       onclick="return confirm('Are you sure you want to change active/inactive this user?')">
                        <i class="fa fa-ban"></i>
                    </a>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$users->links()}}
</div>
