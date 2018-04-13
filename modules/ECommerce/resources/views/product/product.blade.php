@extends('layout.main')
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
                <span class="input-group-btn " >
                    <a href="{{asset('')}}product/delete-product/{{$value->id}}" class="btn-danger btn"><span class="glyphicon glyphicon-remove"></span></a>
                    <a href="{{asset('')}}product/update-product/{{$value->id}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                </span>
              <input type="text" name="name" readonly required="" value="{{$value->name}}" class="form-control">
            </div>
        @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
    <a href="{{asset('')}}product/add-product" style="text-decoration: none;color: #f5f5f5">
        <button class=" btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span></button>
    </a>
@endsection