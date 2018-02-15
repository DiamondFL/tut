<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.rg_test_id')}}</th>
<th>{{trans('label.user_id')}}</th>
<th>{{trans('label.score')}}</th>
<th>{{trans('label.rg_results_id')}}</th>

        <th></th>
    </tr>
    @foreach($rgResults as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->rg_test_id}}</td>
<td>{{$row->user_id}}</td>
<td>{{$row->score}}</td>
<td>{{$row->rg_results_id}}</td>

       <td>
           <form method="POST" action="{{route('rg-result.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('rg-result.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$rgResults->links()}}
</div>
