@extends('frontend.outline')
@section('content')
     <div class="center_content">
          <div class="bg">
              <h3>Tìm kiếm sản phẩm</h3>
              <hr />
              <form method="get" name="formbaogia" action="/baogia">
               <div class="khung">
                   <div class="top_khung"></div>
                   <div class="center_khung">
                         <div class="nd_form">
                                <div class="form">
                                      <label class="nd"><strong>Từ khóa tìm kiếm:</strong> </label>
                                      <input type="text" class="nd_input" placeholder="Từ khóa tìm kiếm" />
                                </div>

                                <div class="form">
                                      <label class="nd"><strong>Thương hiệu:</strong></label>

                                      <select name="thương hiệu" size="1" id="th">
                                           <option value="tcsp">Tất cả sản phẩm</option>
                                           <option value="ap">Apple</option>
                                           <option value="ss">Samsung</option>
                                           <option value="nk">Nokia</option>
                                           <option value="htc">HTC</option>
                                           <option value="lg">LG</option>
                                           <option value="op">OPPO</option>
                                           <option value="lnv">Lenovo</option>
                                           <option value="mb">Mobell</option>
                                           <option value="mbs">Mobiistar</option>
                                           <option value="qmb">Q-Mobile</option>
                                           <option value="as">Asus</option>
                                       </select>
                                </div>

                                <div class="form">
                                      <label class="nd"><strong>Khoảng giá từ:</strong></label>
                                      <input type="text" class="nd_input" placeholder="Giá từ" />
                                </div>

                                <div class="form">
                                      <label class="nd"><strong>Đến giá:</strong></label>
                                      <input type="text" class="nd_input" placeholder="Giá đến"/>
                                </div>

                                <div class="form">
                                      <label class="nd"><strong>Sắp xếp theo:</strong></label>

                                      <select name="sắp xếp" size="1" id="th">
                                           <option value="caothap">Giá cao đến thấp</option>
                                           <option value="thapcao">Giá thấp đến cao</option>
                                           <option value="az">Tên A-Z</option>
                                           <option value="za">Tên Z-A</option>
                                       </select>
                                </div>


                        <div class="form">
                            <a href="#" class="nd">Lấy báo giá</a>
                        </div>

                    </div>

                   </div>
                   <div class="bottom_khung"></div>
            </div>
            </form>
          </div>
     </div>
@endsectiond

