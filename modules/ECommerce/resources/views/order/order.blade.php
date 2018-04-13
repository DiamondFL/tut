@extends('layout.main')
@section('title')
Đơn hàng
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @if($order->count())
        @foreach($order as $value)
            <div class="input-group">
                <span class="input-group-btn " >
                    <a href="{{asset('')}}order/delete-order/{{$value->id}}" class="btn-danger btn"><span class="glyphicon glyphicon-remove"></span></a>
                    <a href="{{asset('')}}order/update-order/{{$value->id}}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open"></span> / <span class="glyphicon glyphicon-edit"></span></a>
                </span>
              <input type="text" name="name" readonly required="" value="Khách hàng: {{$value->user->fullName}} - Thời gian đặt hàng: {{$value->created_at}}" class="form-control">
            </div>
        @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
    <a href="{{asset('')}}order/add-order" style="text-decoration: none;color: #f5f5f5">
        <button class=" btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span></button>
    </a>
@endsection