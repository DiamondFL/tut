<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('eco')}}" ><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{route('eco.product.show')}}"><span class="glyphicon glyphicon-send"></span></a></li>
        @if(auth()->check())
             <li><a href="{{Asset('')}}news/news-show"><span class="glyphicon glyphicon-book"></span></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle glyphicon glyphicon-sort-by-order" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{route('group.index')}}">Nhóm</a></li>
                <li><a href="{{route('style.index')}}">Loại</a></li>
                <li><a href="{{route('news.index')}}">Bài viết</a></li>
                <li><a href="{{route('product.index')}}" class="glyphicon glyphicon-gift"></a></li>
                <li><a href="{{route('order.index')}}" class="glyphicon glyphicon-shopping-cart"></a></li>
                <li><a href="{{route('us.index')}}"><span class="glyphicon glyphicon-user"></span></a></li>
              </ul>
            </li>
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
        @if(auth()->check())
            <li><!-- Button trigger modal -->
                <a class="btn btn-md" data-toggle="modal" data-target="#shoppingCart"><span class="glyphicon glyphicon-shopping-cart"></span> 3</a></li>
            <li>
                <a class="btn btn-md" href="{{route('logout')}}"><span class="glyphicon glyphicon-off"></span></a>
            </li>
            <li>
                <a class="glyphicon glyphicon-refresh" href="{{route('password.request')}}"></a>
            </li>
        @else
            <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span></a></li>
            <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span></a></li>
            <li><a href="{{route('password.request')}}"><span class="glyphicon glyphicon-refresh"></span></a></li>
        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>