@extends('eco::layout.main')
@section('title')
Cập nhật đơn hàng
@stop
@section('content')
   <form class="form-horizontal" method="post" enctype="multipart/form-data">
   <input type="hidden" value="{{$order->id}}" name="id">
   <?php $listId=explode(' ',$order->listProducts); $listQty = explode(' ',$order->listQty)?>
        <h3>Thông tin đơn hàng</h3>
        <table class="table-responsive table">
            <form method="post" action="{{Asset("")}}cart/update-cart">
            <?php $totalQty=0; $totalMoney =0; $i=0;?>
                <tr>
                    <th>Số lượng</th>
                    <th>Tên sản phẩm</th>
                    <th style="text-align: right">Đơn giá</th>
                    <th style="text-align: right">Thành tiền</th>
                </tr>

                @for($i=0;$i<count($listId);$i++)
                    <?php $totalQty+=$listQty[$i]; $totalMoney+=Products::find($listId[$i])->price*$listQty[$i]?>
                    <?php $name=Products::find($listId[$i])->name; $price=Products::find($listId[$i])->price; ?>
                    <tr>
                        <td><input name="{{$listQty[$i]}}" type="number" value="{{$listQty[$i]}}" maxlength="2" size="3"></td>
                        <td>{{$name}}</td>
                        <td style="text-align: right">{{number_format($price)}} Đ</td>
                        <td style="text-align: right">{{number_format($listQty[$i]*$price)}} Đ</td>
                    </tr>
                @endfor
                <tr>
                    <th>Tổng sản phẩm:</th>
                    <td>{{number_format($totalQty)}}</td>
                    <th>Tổng tiền:</th>
                    <td style="text-align: right">{{number_format($totalMoney)}} Đ</td>
                </tr>
            </form>
        </table>
   </form>
   <hr>
   <h3>Khách hàng</h3>
        <table class="table-responsive table">
             <tr>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
            </tr>
            <tr>
                <td>{{$order->user->fullName}}</td>
                <td>{{$order->user->phone}}</td>
                <td>{{$order->user->email}}</td>
                <td>{{$order->user->address}}</td>
            </tr>
        </table>
@stop
