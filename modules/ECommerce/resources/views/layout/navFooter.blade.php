<nav class="navbar navbar-btn navbar-fixed-bottom">
    <div class="collapse col-md-4 col-md-offset-8" id="collapseExample">
      <div class="well" style="background: #5bc0d0">

           <div class="col-lg-8"><p ><strong>Name:</strong>fsdfsdfsdfsdfsdfs</p></div>

           <div class="col-lg-8"><p ><strong>Name:</strong>fsdfsdfsdfsdfsdfs</p></div>

           <div class="col-md-8 col-md-offset-3"><p style="color: white"><strong>Name:</strong>fsdfsdfsdfsdfsdfs</p></div>
           <div class="col-md-8 col-md-offset-3"><p style="color: white"><strong>Name:</strong>fsdfsdfsdfsdfsdfs</p></div>
           <div class="col-md-8 col-md-offset-3"><p style="color: white"><strong>Name:</strong>fsdfsdfsdfsdfsdfs</p></div>


         <input type="text" placeholder="Tin nhắn ..." class="form-control">
      </div>
    </div>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">T</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       {{--<a style="color: #006600" class="navbar-brand toggleVisible">Chào mừng</a>--}}
    </div>
    <div id="navbar" class="navbar-collapse collapse" >
      {{--<ul class="nav navbar-nav">
        @if(Auth::check())
            <li>
                <a style="color: #000088"><strong>{{Auth::user()->fullName}} </strong>đã đến với cửa hàng Origami Ying Ying!</a>
            </li>
        @endif
      </ul>--}}

      @if(Auth::check())

      <form class="navbar-form navbar-right">
         <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tư vấn online</button>
          {{--<div class="form-group">
            <input type="password" placeholder="Tin nhắn ..." class="form-control">
          </div>--}}
        </form>
        @if(isset($searchLike))
        <form class="input-group navbar-form navbar-right" action="{{asset('')}}{{$searchLike}}" method="post">
          <input class="form-control" type="text" aria-describedby="basic-addon2" placeholder="Nhập tên ..." name="searchName">
          <button class="btn-success btn">
              <span>
                  <span class="glyphicon glyphicon-search"></span>
              </span>
          </button>
        </form>

          <form class="input-group navbar-form navbar-right" action="{{asset('')}}product/product-search-price" method="post">
              <select class="form-control" name="searchPrice">
                <option value="0">0 - 50,000 Đ</option>
                <option value="1">50,000 Đ - 10,000 Đ</option>
                <option value="2">100,000 Đ - 150,000 Đ</option>
                <option value="3">150,000 Đ - 200,000 Đ</option>
                <option value="4">200,000 Đ - Lớn nhất</option>
              </select>
              <button class="btn-success btn">
                  <span>
                      <span class="glyphicon glyphicon-search"></span>
                  </span>
              </button>
          </form>
          @endif
      @endif
    </div><!--/.nav-collapse -->
  </div>
</nav>