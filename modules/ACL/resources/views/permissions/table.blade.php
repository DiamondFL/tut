{{--<table class="table table-hover table-nomargin table-condensed table-responsive" id="table">--}}
    {{--<tr>--}}
        {{--<th>--}}
            {{--<div class="checkbox checkbox-replace color-primary">--}}
                {{--<input type="checkbox">--}}
            {{--</div>--}}
        {{--</th>--}}
        {{--<th>Name</th>--}}
        {{--<th>Display name</th>--}}
        {{--<th>Is active</th>--}}
        {{--<th>Role</th>--}}
        {{--<th></th>--}}
    {{--</tr>--}}
    {{--@foreach($permissions as $permission)--}}
        {{--<tr>--}}
            {{--<td>--}}
                {{--<input type="checkbox" id="{{$permission->id}}">--}}
            {{--</td>--}}
            {{--<td><a href="{{route('permissions.edit', $permission->id)}}">{{$permission->name}}</a></td>--}}
            {{--<td>{{$permission->display_name}}</td>--}}
            {{--<td>{!! $permission->is_active ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-ban text-danger"></i>' !!}</td>--}}
            {{--<td>--}}
                {{--<a data-toggle="modal" data-target="#role_permission" class="btn btn-sm btn-default"--}}
                   {{--onclick="getRoles('{{$permission->id}}', '{{route('involve.permission.roles')}}')">Set Role </a>--}}
                {{--<form class="form-group" action="{{route('permissions.destroy', $permission->id)}}" method="POST"--}}
                      {{--style="display: inline">--}}
                    {{--{{csrf_field()}}--}}
                    {{--{{method_field('DELETE')}}--}}
                    {{--<button class="btn btn-danger destroyBtn btn-sm"><i class="fa fa-remove"></i></button>--}}
                {{--</form>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
{{--</table>--}}
<table class="table">
    <tr class="text-left">
        <td class="text-left">
            Module
        </td>
        <td class="text-left">
            Access
        </td>
        <td class="text-left">
            Level
        </td>
        {{--<td></td>--}}
    </tr>
    @if(request()->get('role_id'))
        @foreach(ACCESS_MODULE as $module_id => $module_name)
            <tr>
                <td>{{$module_name}}</td>
                <td>{{isset($accessList[$module_id]) ? $accessList[$module_id] : ''}}</td>
                <td>{{isset($levelList[$module_id]) ? $levelList[$module_id] : ''}}</td>
                {{--<td>--}}
                    {{--<select class="form-control input-sm" name="level">--}}
                        {{--<option value="0">NA</option>--}}
                        {{--@foreach(LEVELS as $level)--}}
                            {{--<option value="{{$level}}">{{$level}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</td>--}}
            </tr>
        @endforeach
    @endif
</table>