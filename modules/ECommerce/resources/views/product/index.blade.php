@extends('eco::layout.main')
@section('title')
Sản phẩm
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @if($product->count())
        @foreach($product as $value)
            <div class="input-group">
                <form class="input-group-btn " method="POST" action="{{route('product.destroy', $value->id)}}" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn-danger btn">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <a href="{{route('product.edit', $value->id)}}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </form>
              <input type="text" name="name" readonly required="" value="{{$value->name}}" class="form-control">
            </div>
        @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
    <a href="{{route('product.create')}}" style="text-decoration: none;color: #f5f5f5">
        <button class=" btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span></button>
    </a>
@endsection