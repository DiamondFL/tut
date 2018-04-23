@extends('eco::layout.main')
     @section('title')
         Trang chủ
     @stop
    @section('content')
         @if(Auth::user()->level==0)
         <form method="post">
           <div class="input-group">
                 <input type="text" name = "code" class="form-control" placeholder="Mã xác nhận công việc...">
                 <span class="input-group-btn">
                   <button class="btn btn-default" type="submit">Nhận</button>
                 </span>
               </div>
         </form>
         @endif
     @stop