<div class="modal fade" id="shoppingCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Giỏ hàng của bạn</h4>
      </div>
      <div class="modal-body table-responsive">
             @if(Session::has('cart'))
                  <table class="table-responsive table">
                    <form id="modalCart" method="post" action="{{Asset("")}}cart/update-cart">
                    <?php $totalQty=0; $totalMoney =0; $i=0;?>
                        <tr>
                            <th>Số lượng</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
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
            @else
                Giỏ hàng trống
            @endif
      </div>
      <div class="modal-footer">
        <a class="btn btn-sm btn-danger" href='{{Asset("")}}cart/delete-cart'>Xóa giỏ hàng</a>
        <a class="btn btn-sm btn-warning" onclick="$('#modalCart').submit()">Cập nhật</a>
        <a class="btn btn-sm btn-success" href='{{Asset("")}}cart/order-cart'>Đặt hàng</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>