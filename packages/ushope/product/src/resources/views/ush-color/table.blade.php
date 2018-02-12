<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.code')}}</th>
<th>{{trans('label.icon')}}</th>

        <th></th>
    </tr>
    @foreach($ushColors as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->code}}</td>
<td>{{$row->icon}}</td>

       <td>
           <form method="POST" action="{{route('ush-color.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('ush-color.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
               <a href="{{route('ush-color.show', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-eye"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$ushColors->links()}}
</div>
