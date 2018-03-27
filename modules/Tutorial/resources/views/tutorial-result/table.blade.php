<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.created_by')}}</th>
<th>{{trans('label.tutorial_id')}}</th>
<th>{{trans('label.score')}}</th>

        <th></th>
    </tr>
    @foreach($tutorialResults as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->created_by}}</td>
<td>{{$row->tutorial_id}}</td>
<td>{{$row->score}}</td>

       <td>
           <form method="POST" action="{{route('tutorial-result.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('tutorial-result.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
               <a href="{{route('tutorial-result.show', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-eye"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$tutorialResults->links()}}
</div>
