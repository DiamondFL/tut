<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{Asset('')}}" ><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        {{--<li><a href="{{Asset('')}}product/show-product"><span class="glyphicon glyphicon-send"></span></a></li>--}}
        @if(Auth::check() && Auth::user()->level===1)
             {{--<li><a href="{{Asset('')}}news/news-show"><span class="glyphicon glyphicon-book"></span></a></li>--}}
            {{--<li class="dropdown">--}}
              {{--<a href="#" class="dropdown-toggle glyphicon glyphicon-sort-by-order" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>--}}
              {{--<ul class="dropdown-menu" role="menu">--}}
                <li><a href="{{Asset('')}}group">Nhóm</a></li>
                <li><a href="{{Asset('')}}style">Loại</a></li>
                <li><a href="{{Asset('')}}news">Bài viết</a></li>
                <li><a href="{{Asset('')}}product" ><span class="glyphicon glyphicon-gift"></span> Sản phẩm</a></li>
                {{--<li><a href="{{Asset('')}}order" class="glyphicon glyphicon-shopping-cart"></a></li>--}}
                <li><a href="{{Asset('')}}us"><span class="glyphicon glyphicon-user"></span> Tài khoản</a></li>
              {{--</ul>--}}
            {{--</li>--}}
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(isset($group) && isset($style) && isset($searchLike))
            <li>
                 <form class="input-group navbar-form" action="{{asset('')}}{{$search}}" method="post">
                    <select class="form-control" type="text" aria-describedby="basic-addon2" name="group">
                        <option value="0">-- Nhóm --</option>
                        @foreach($group as $v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" type="text" aria-describedby="basic-addon2" name="style">
                        <option>-- Loại --</option>
                        @foreach($style as $v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn-success btn">
                        <span>
                            <span class="glyphicon glyphicon-search"></span>
                        </span>
                    </button>
                </form>
            </li>
        @endif
        @if(Auth::check())
            {{--<li><!-- Button trigger modal -->--}}
                {{--<a class="btn btn-md" data-toggle="modal" data-target="#shoppingCart"><span class="glyphicon glyphicon-shopping-cart"></span> 3</a></li>--}}
            <li><a class="btn btn-md" href="{{URL::route('account-sign-out')}}"><span class="glyphicon glyphicon-off"></span></a></li>
            <li><a class="glyphicon glyphicon-refresh" href="{{URL::route('account-change-password')}}"></a></li>
        @else
            <li><a href="{{URL::route('account-sign-in')}}"><span class="glyphicon glyphicon-log-in"></span></a></li>
            <li><a href="{{URL::route('account-create')}}"><span class="glyphicon glyphicon-user"></span></a></li>
            <li><a href="{{URL::route('account-forgot-password')}}"><span class="glyphicon glyphicon-refresh"></span></a></li>
        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>