<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.question')}}</th>
<th>{{trans('label.score')}}</th>
<th>{{trans('label.type')}}</th>

        <th></th>
    </tr>
    @foreach($questions as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->question}}</td>
<td>{{$row->score}}</td>
<td>{{$row->type}}</td>

       <td>
           <a href="{{route('questions.edit', $row->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
           <form  class="form-inline" method="POST" action="{{route('questions.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$questions->links()}}
</div>
