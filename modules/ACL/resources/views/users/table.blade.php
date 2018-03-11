<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.first_name')}}</th>
        <th>{{trans('label.last_name')}}</th>
        <th>{{trans('label.email')}}</th>
        <th>{{trans('label.phone_number')}}</th>
        <th>{{trans('label.sex')}}</th>
        <th>{{trans('label.birthday')}}</th>
        <th>{{trans('label.avatar')}}</th>
        <th>{{trans('label.active')}}</th>
        <th>{{trans('label.last_login')}}</th>
        <th>{{trans('label.last_logout')}}</th>
        <th></th>
    </tr>
    @foreach($users as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>{{$row->first_name}}</td>
            <td>{{$row->last_name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->phone_number}}</td>
            <td>{{$row->sex}}</td>
            <td>{{$row->birthday}}</td>
            <td>{{$row->avatar}}</td>
            <td>{{$row->active}}</td>
            <td>{{$row->last_login}}</td>
            <td>{{$row->last_logout}}</td>
            <th>
                <button class="btn btn-sm btn-info" onclick="getRoles('{{$row->id}}', '{{route('involve.user.roles')}}')" data-toggle="modal" data-target="#role_user">Set role</button>
            </th>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$users->links()}}
</div>
