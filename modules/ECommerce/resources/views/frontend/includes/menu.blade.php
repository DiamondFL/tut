<div id="menu_tab">
    <div class="left_menu_corner"></div>
    <div class="menu">
        <ul>
            <li><a href="{{asset('')}}" id="tc">Trang chủ</a></li>
            <li class="chia"></li>
            <li><a id="dt">Sản phẩm</a>
                <ul>
                    @foreach($style as $k=>$v)
                        <li><a href="{{route('product.style', $k)}}">{{$v}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="chia"></li>
            <li><a href="{{route('baogia')}}" id="pk">Báo giá</a></li>
            <li class="chia"></li>
            <li><a href="{{route('news')}}" id="tt">Tin tức</a></li>
            <li class="chia"></li>
            <li><a href="{{route('contact')}}" id="lh">Liên hệ</a></li>
            <li class="chia"></li>
            <li><a href="{{route('intro')}}" id="gt">Giới thiệu</a></li>
        </ul>
    </div>
    <div class="right_menu_corner"></div>
</div>