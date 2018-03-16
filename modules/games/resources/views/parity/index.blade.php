@extends('edu::layouts.app')
@section('container')
   <div class="col-md-12">
       <h1 style="font-style: italic" class="text-info">Chẵn lẻ</h1>
       <form action="{{route('parity.play')}}" method="POST" class="col-md-4 col-md-offset-4 text-info" >
           {!! csrf_field() !!}
           <label for="">Đỗ thánh thử tài</label>
           <ul class="list-group">
               <li class="list-group-item">Chẵn
                   <input required type="radio" {{ isset($betting) && $betting === '1' ? 'checked' : ''}} value="1" class="pull-right" name="betting">
               </li>
               <li class="list-group-item">lẻ
                   <input required type="radio" {{ isset($betting) && $betting  === '0' ? 'checked' : ''}} value="0" class="pull-right" name="betting">
               </li>
           </ul>
           <div class="form-group">
               <label for="">Đặt coin</label>
               <input type="number" value="{{ isset($coin) ? $coin : 1 }}" class="form-control" placeholder="coin" name="coin">
           </div>
           <div class="form-group">
               <input type="checkbox" value="1" placeholder="coin" name="coin">
               <p class="text-warning">Tuyệt chiêu siêu vô địch đắc thắng thủ</p>
           </div>
           <div class="text-center form-group">
               <button class="btn btn-primary">Play</button>
           </div>
       </form>
   </div>
@endsection

@push('head')
    <style>
        body {
            background: url('{{asset('img/games/bg.jpg')}}')
        }
    </style>
@endpush