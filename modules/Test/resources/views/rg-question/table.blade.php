<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.content')}}</th>

        <th></th>
    </tr>
    @foreach($rgQuestions as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->content}}</td>

       <td>
           <form method="POST" action="{{route('rg-question.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger destroyBtn btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('rg-question.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$rgQuestions->links()}}
</div>
