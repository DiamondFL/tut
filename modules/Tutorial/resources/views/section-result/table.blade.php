<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.created_by')}}</th>
<th>{{trans('label.section_id')}}</th>
<th>{{trans('label.score')}}</th>

        <th></th>
    </tr>
    @foreach($sectionResults as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->created_by}}</td>
<td>{{$row->section_id}}</td>
<td>{{$row->score}}</td>

       <td>
           <form method="POST" action="{{route('section-result.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('section-result.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
               <a href="{{route('section-result.show', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-eye"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$sectionResults->links()}}
</div>
