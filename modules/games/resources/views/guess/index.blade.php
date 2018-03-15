@extends('edu::layouts.app')
@section('container')
   <div class="col-md-12">
       <h1 style="font-style: italic" class="text-info">Đoán xí ngầu</h1>
       <form action="{{route('parity.play')}}" method="POST">
           {!! csrf_field() !!}
           <label for="">Đỗ thánh thử tài</label>
           <ul class="list-group">
               @for($i = 1; $i < 7; $i++)
               <li class="list-group-item">{{$i}}
                   <input required type="radio" value="{{$i}}" class="pull-right" name="betting">
               </li>
               @endfor
           </ul>
           <div class="form-group">
               <label for="">Đặt coin</label>
               <input type="number" value="1"  class="form-control" placeholder="coin" name="coin">
           </div>
           <div class="form-group">
               <input type="checkbox" value="1" placeholder="coin" name="coin">
               <p class="text-warning">Sử dụng tuyệt chiêu. Xung thiên pháo</p>
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