<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.name')}}</th>

        <th></th>
    </tr>
    @foreach($ushSeasons as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->name}}</td>

       <td>
           <a href="{{route('ush-product.edit', $row->id)}}" class="btn btn-info">
               <i class="fa fa-edit"></i>
           </a>
           <form style="display: inline" class="form-inline" method="POST" action="{{route('ush-product.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger">
                   <i class="fa fa-trash"></i>
               </button>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$ushSeasons->links()}}
</div>
