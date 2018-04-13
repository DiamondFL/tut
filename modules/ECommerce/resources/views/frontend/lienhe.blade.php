@extends('frontend.outline')
             <!-------------- center content----------------->
@section('content')
<div class="center_content">
    <div class="thanh_tieu_de">Liên hệ</div>
    <div class="khung">
        <div class="top_khung"></div>
        <div class="center_khung">
             <div class="nd_form">
                    <div class="form">
                          <label class="nd"><strong>Tên đầy đủ:</strong></label>
                          <input type="text" class="nd_input" />
                    </div>

                    <div class="form">
                          <label class="nd"><strong>Email:</strong></label>
                          <input type="text" class="nd_input" />
                    </div>

                    <div class="form">
                          <label class="nd"><strong>Điện thoại:</strong></label>
                          <input type="text" class="nd_input" />
                    </div>


                    <div class="form">
                         <label class="nd"><strong>Thông tin liên hệ:</strong></label>
                         <textarea class="nd_textarea" ></textarea>
                    </div>

                <div class="form">
                    <a href="#" class="nd">Gửi</a>
                </div>
            </div>
        </div>
        <div class="bottom_khung"></div>
    </div>
</div>
@endsection
                    
