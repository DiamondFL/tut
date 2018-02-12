<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('ush-p::label.ush_product_id')}}</th>
        <th>{{trans('ush-p::label.img')}}</th>

        <th></th>
    </tr>
    @foreach($ushColorProducts as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->ush_product_id}}</td>
<td>{{$row->img}}</td>

       <td>
           <form method="POST" action="{{route('ush-color-product.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger btn-xs">
                   <i class="fa fa-trash"></i>
               </button>
               <a href="{{route('ush-color-product.edit', $row->id)}}" class="btn btn-info btn-xs">
                   <i class="fa fa-edit"></i>
               </a>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$ushColorProducts->links()}}
</div>
