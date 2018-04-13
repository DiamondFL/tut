<div class="left_content">
    <!------ thương hiệu------------>
    <div class="title_box">Thương Hiệu</div>
    <ul class="left_menu">
        @foreach($style as $k=>$v)
            <li><a href="{{route('product.style', $k)}}">{{$v}}</a></li>
        @endforeach
    </ul>

    <!----------Sản phẩm đặc biệt--------->
    <div class="title_box">Sản Phẩm Đặc Biệt</div>
    <div class="border_box">
        <div class="Sanpham_tieude"><a href="#">Samsung Galaxy S7</a></div>
        <div class="Sanpham_image"><a href="#"><img src="{{asset('')}}images/điệnthoại.jpg" alt="điện thoại"/></a></div>
        <div class="Sanpham_gia">
            <span class="giam">15.990.000đ</span>
            <span class="gia">14.990.000đ</span>
        </div>
    </div>

    <!----------newsletter--------->
    <div class="title_box">Newsletter</div>
    <div class="border_box">
        <input type="text" name="Newsletter" class="Newsletter_input" value="" placeholder="your email"/>
        <a href="#" class="thamgia">Tham gia</a>
    </div>


    <!----------banner--------->
    <div class="banner_adds">
        <a href="#"><img src="{{asset('')}}images/quảng cáo.jpg" alt="banner"/></a>
    </div>

</div>