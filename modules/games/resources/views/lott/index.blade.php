@extends('edu::layouts.app')
@section('container')
   <div class="col-md-12">
       <h1 style="font-style: italic" class="text-info text-center">Portal lott</h1>
        @if(isset($numberLotts))
       <div class="btn-group btn-group-justified form-group" role="group" aria-label="...">
           @foreach($numberLotts as $numberLott)
               <div class="btn-group" role="group">
                   <button type="button" class="btn btn-default {{in_array($numberLott, $numberSames) ? 'btn-success': ''}}">
                       {{$numberLott}}
                   </button>
               </div>
           @endforeach
       </div>
       @endif
       <form action="{{route('lott.play')}}" method="POST" class="col-md-8 col-md-offset-2">
           {!! csrf_field() !!}
           <label class="text-info">Đỗ thánh thử tài</label>
           @if(isset($lotts))
           <div class="row form-group">
               @for($i = 1; $i < 7; $i++)
                   <div class="col-md-2">
                       <input value="{{$lotts[$i - 1]}}" required type="number" min="0" class="form-control" name="lott[]">
                   </div>
               @endfor
           </div>
           @else
           <div class="row form-group">
               @for($i = 1; $i < 7; $i++)
                   <div class="col-md-2">
                       <input required type="number" min="0" class="form-control" name="lott[]">
                   </div>
               @endfor
           </div>
           @endif
           {{--<div class="form-group">--}}
               {{--<label for="">Đặt coin</label>--}}
               {{--<input type="number" value="{{ isset($coin) ? $coin : 1 }}"  class="form-control" placeholder="coin" name="coin">--}}
           {{--</div>--}}
           <div class="form-group">
               <input type="checkbox" value="1" placeholder="coin" name="coin">
               <p class="text-warning">Bạn có thể được mặc định trúng một cặp số</p>
           </div>
           <div class="form-group text-right">
               <p class="text-info">3 cặp số trúng 300 Coin</p>
               <p class="text-info">4 cặp số trúng 3,000 Coin</p>
               <p class="text-info">5 cặp số trúng 1,000,000 Coin</p>
               <p class="text-info">6 cặp số trúng 1,000,000,000 Coin</p>
               <p class="text-danger">Phí mỗi lần chơi là 10 Coin</p>
           </div>
           <div class="text-center form-group">
               <button class="btn btn-primary"><i class="entypo-bell"></i> Play</button>
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