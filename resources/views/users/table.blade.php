<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.first_name')}}</th>
<th>{{trans('label.last_name')}}</th>
<th>{{trans('label.code')}}</th>
<th>{{trans('label.email')}}</th>
<th>{{trans('label.phone_number')}}</th>
<th>{{trans('label.sex')}}</th>
<th>{{trans('label.password')}}</th>
<th>{{trans('label.birthday')}}</th>
<th>{{trans('label.address')}}</th>
<th>{{trans('label.avatar')}}</th>
<th>{{trans('label.remember_token')}}</th>
<th>{{trans('label.active')}}</th>
<th>{{trans('label.last_login')}}</th>
<th>{{trans('label.last_logout')}}</th>
<th>{{trans('label.slack_webhook_url')}}</th>

        <th></th>
    </tr>
    @foreach($users as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->first_name}}</td>
<td>{{$row->last_name}}</td>
<td>{{$row->code}}</td>
<td>{{$row->email}}</td>
<td>{{$row->phone_number}}</td>
<td>{{$row->sex}}</td>
<td>{{$row->password}}</td>
<td>{{$row->birthday}}</td>
<td>{{$row->address}}</td>
<td>{{$row->avatar}}</td>
<td>{{$row->remember_token}}</td>
<td>{{$row->active}}</td>
<td>{{$row->last_login}}</td>
<td>{{$row->last_logout}}</td>
<td>{{$row->slack_webhook_url}}</td>

       <td>
           <a href="{{route('users.edit', $row->id)}}" class="btn btn-info">
               <i class="fa fa-edit"></i>
           </a>
           <form style="display: inline" class="form-inline" method="POST" action="{{route('users.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger">
                   <i class="fa fa-trash"></i>
               </button>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$users->links()}}
</div>
