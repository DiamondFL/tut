<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.lesson_id')}}</th>
<th>{{trans('label.content')}}</th>
<th>{{trans('label.create_by')}}</th>
<th>{{trans('label.is_active')}}</th>

        <th></th>
    </tr>
    @foreach($lessonComments as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->lesson_id}}</td>
<td>{{$row->content}}</td>
<td>{{$row->create_by}}</td>
<td>{{$row->is_active}}</td>

       <td>
           <form method="POST" action="{{route('lesson-comment.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('lesson-comment.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
               <a href="{{route('lesson-comment.show', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-eye"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$lessonComments->links()}}
</div>
