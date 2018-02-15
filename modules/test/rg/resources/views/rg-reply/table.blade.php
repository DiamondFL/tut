<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.rg_question_id')}}</th>
<th>{{trans('label.content')}}</th>
<th>{{trans('label.integer')}}</th>

        <th></th>
    </tr>
    @foreach($rgReplies as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->rg_question_id}}</td>
<td>{{$row->content}}</td>
<td>{{$row->integer}}</td>

       <td>
           <form method="POST" action="{{route('rg-reply.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('rg-reply.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$rgReplies->links()}}
</div>
