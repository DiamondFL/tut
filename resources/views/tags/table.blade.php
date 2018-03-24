<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th><th>{{trans('label.name')}}</th>

        <th></th>
    </tr>
    @foreach($tags as $row)
    <tr>
        <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td><td>{{$row->name}}</td>

       <td>
           <a href="{{route('tags.edit', $row->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
           <form style="display: inline" class="inline" method="POST" action="{{route('tags.destroy', $row->id)}}">
               {{csrf_field()}}
               {{method_field('DELETE')}}
               <button class="btn btn-danger destroyBtn btn-sm"><i class="fa fa-trash"></i></button>
           </form>
       </td>
    </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$tags->links()}}
</div>
