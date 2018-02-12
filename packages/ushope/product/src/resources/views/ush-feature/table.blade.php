<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.name')}}</th>

        <th></th>
    </tr>
    @foreach($ushFeatures as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->name}}</td>

       <td>
           <form method="POST" action="{{route('ush-feature.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('ush-feature.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$ushFeatures->links()}}
</div>
