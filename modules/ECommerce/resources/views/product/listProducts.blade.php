@if($products->count())
     <h3><strong>Sản phẩm liên quan</strong></h3>
    <div class="row">
    @foreach($products as $value)
          <div class="col-sm-4 col-md-3">
            <div class="thumbnail" style="text-align: center">
              <img src="{{asset('')}}{{$value->picture}}" alt="...">
              <div class="caption">
                <h3>{{$value->name}}</h3>
                <p>{{number_format($value->price)}} Đ</p>
                <p><a href='{{asset('')}}cart/add-cart/{{$value->id}}' class="btn btn-primary" role="button">Mua</a>
                <a href="{{asset('')}}product/product-details/{{$value->id}}" class="btn btn-default" role="button">Chi tiết</a></p>
              </div>
            </div>
          </div>
    @endforeach
    </div>
@else
    Hiện tại dữ liệu trống.
@endif