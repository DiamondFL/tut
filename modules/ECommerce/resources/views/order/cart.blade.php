@extends('eco::layout.main')
@section('title')
Giỏ hàng
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    <h3><strong>Giỏ hàng của bạn</strong></h3>
    <div class="table-responsive">
         @if(Session::has('cart'))
              <table class="table-responsive table">
                <form id="mainCart" method="post" action="{{Asset("")}}cart/update-cart">
                <?php $totalQty=0; $totalMoney =0; $i=0;?>
                    <tr>
                        <th>Số lượng</th>
                        <th>Tên sản phẩm</th>
                        <th style="text-align: right">Đơn giá</th>
                        <th style="text-align: right">Thành tiền</th>
                    </tr>
                    @foreach(Session::get('cart') as $key=>$value)
                    <?php $totalQty+=$value; $totalMoney+=Products::find($key)->price*$value?>
                    <?php $name=Products::find($key)->name; $price=Products::find($key)->price; ?>
                    <tr>
                        <td><input name="{{$key}}" type="number" value="{{$value}}" maxlength="2" size="3"></td>
                        <td>{{$name}}</td>
                        <td style="text-align: right">{{number_format($price)}} Đ</td>
                        <td style="text-align: right">{{number_format($value*$price)}} Đ</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th>Tổng sản phẩm:</th>
                        <td>{{number_format($totalQty)}}</td>
                        <th>Tổng tiền:</th>
                        <td style="text-align: right">{{number_format($totalMoney)}} Đ</td>
                    </tr>
                </form>
              </table>
               <div class="modal-footer">
                  <a class="btn btn-sm btn-danger" href='{{Asset("")}}cart/delete-cart'>Xóa giỏ hàng</a>
                  <a class="btn btn-sm btn-warning" onclick="$('#mainCart').submit()">Cập nhật</a>
                </div>
        @else
            Giỏ hàng trống
        @endif
      </div>
       <hr>
    <h3><strong>Thông tin của quý khách</strong></h3>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Họ tên</label>
            <div class="col-sm-7">
                <input type="text" required="" value="{{Auth::user()->fullName}}" class="form-control" placeholder="Họ tên của bạn..."/>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-7">
                <input type="email" required="" class="form-control" value="{{Auth::user()->email}}" placeholder="Email của bạn..."/>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Số điện thoại</label>
            <div class="col-sm-7">
                <input type="number" required="" class="form-control" value="{{Auth::user()->numberPhone}}" placeholder="Số điện thoại..."/>
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="col-sm-3 control-label">Địa chỉ nhận hàng</label>
            <div class="col-sm-7">
                <textarea rows="3" required="" class="form-control" value="{{Auth::user()->address}}" placeholder="Địa chỉ ..."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-sm-offset-3 col-sm-4">
                <a class="btn btn-sm btn-success" href='{{Asset("")}}cart/order-cart'>Đặt hàng</a>
                <button type="reset" class="btn btn-sm btn-default">Cập nhật lại thông tin</button>
            </div>
        </div>
    </form>
      <hr>
@endsection