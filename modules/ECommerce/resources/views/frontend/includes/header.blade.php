<!-- TOP: bắt đầu -->
<div class="top">
    <div class="search">
        <div class="search_text"><a href="#">Tìm kiếm</a></div>
        <input type="text" class="search_input" name="Tìm kiếm" />
        <input type="image" src="{{asset('')}}images/search.gif" class="search_bt" />
    </div>
    @if(!Auth::check())
        <div class="dangnhap">
            <a href="{{route('account-sign-in-post')}}"> Đăng nhập</a>
        </div>
    @endif
</div>
<!-- TOP: kết thúc -->

<!-- header: bắt đầu -->
<div class="hearder">
    <div id="logo"><img src="{{asset('')}}images/logo.png.png" alt="images"></div>
    <div class="slider">
        <div class="top_phancach"><img src="{{asset('')}}images/top_phancach.png" alt="images"></div>
        <div class="slide_noidung">
            <div class="noidung">
                <img src="{{asset('')}}images/đt_ip6plus.jpg" alt="images" class="slide_img">
                <div class="slide_chitiet">
                    <div class="slide_tieude">Apple iPhone 6 (Gold)</div>
                    <div class="slide_text"> Màn hình:	4.7Inch. Tốc độ CPU:	 Apple A8, 2x1.4Ghz. Bộ nhớ trong(ROM):	16Gb. HĐH:iOS 8. Pin: 1810 mAh. Bảo hành: Chính hãng 12 tháng. Giá bán: 15.490.000 VNĐ </div>
                    <a href="#" class="chitiet">chi tiết</a>
                </div>
            </div>
            <div class="clr"></div>
            <div class="phantrang">
                <span class="current">1</span>
                <a href="#">5</a>
                <a href="#">4</a>
                <a href="#">3</a>
                <a href="#">2</a>
            </div>
        </div>
        <div class="top_phancach"><img src="{{asset('')}}images/top_phancach.png" alt="images"></div>
    </div>
</div>

<div class="clr"></div>