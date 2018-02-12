<table class="table table-hover table-nomargin">
    <tr>
        <th>
            <div class="check">
                <input type="checkbox" class='icheck-me' data-skin="square" data-color="blue">
            </div>
        </th>
        <th>Name</th>
        <th>Display name</th>
        <th>Is active</th>
        <th>Set permission</th>
    </tr>
    @foreach($roles as $role)
    <tr>
        <td>
            <div class="check">
                <input type="checkbox" class='icheck-me' data-skin="square" data-color="blue">
            </div>
        </td>
        <td><a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a></td>
        <td>{{$role->display_name}}</td>
        <td>{!! $role->is_active ? '<i class="fa fa-check"></i>' : '<i class="fa fa-ban"></i>' !!}</td>
        <td>
            <a data-toggle="modal" data-target="#role_permission" class="btn btn-default set_role_permission" data="{{$role->id}}">Set Permission </a>
            <form class="form-group" action="{{route('roles.destroy', $role->id)}}"
                  style="display: inline">
                <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
