<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.lesson_id')}}</th>
<th>{{trans('label.questions')}}</th>
<th>{{trans('label.reply1')}}</th>
<th>{{trans('label.reply2')}}</th>
<th>{{trans('label.reply3')}}</th>
<th>{{trans('label.reply4')}}</th>
<th>{{trans('label.answer')}}</th>
<th>{{trans('label.is_active')}}</th>
<th>{{trans('label.created_by')}}</th>
<th>{{trans('label.updated_by')}}</th>

        <th></th>
    </tr>
    @foreach($miniTests as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->lesson_id}}</td>
<td>{{$row->questions}}</td>
<td>{{$row->reply1}}</td>
<td>{{$row->reply2}}</td>
<td>{{$row->reply3}}</td>
<td>{{$row->reply4}}</td>
<td>{{$row->answer}}</td>
<td>{{$row->is_active}}</td>
<td>{{$row->created_by}}</td>
<td>{{$row->updated_by}}</td>

       <td>
           <form method="POST" action="{{route('mini-test.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('mini-test.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
               <a href="{{route('mini-test.show', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-eye"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$miniTests->links()}}
</div>
