<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.name')}}</th>
<th>{{trans('label.img')}}</th>
<th>{{trans('label.is_active')}}</th>

        <th></th>
    </tr>
    @foreach($tutorials as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->name}}</td>
<td>{{$row->img}}</td>
<td>{{$row->is_active}}</td>

       <td>
           <form method="POST" action="{{route('tutorial.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('tutorial.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
               <a href="{{route('tutorial.show', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-eye"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$tutorials->links()}}
</div>
