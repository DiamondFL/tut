@extends('edu::layouts.app')
@section('container')
   <div class="col-md-12">
       <h1 style="font-style: italic" class="text-info text-center">Portal lott</h1>
       <form action="{{route('guess.play')}}" method="POST" class="col-md-8 col-md-offset-2">
           {!! csrf_field() !!}
           <label for="">Đỗ thánh thử tài</label>
           <div class="row form-group">
               @for($i = 1; $i < 7; $i++)
                   <div class="col-md-2">
                       <input type="number" min="0" class="form-control" name="lott[]">
                   </div>
               @endfor
           </div>
           {{--<div class="form-group">--}}
               {{--<label for="">Đặt coin</label>--}}
               {{--<input type="number" value="{{ isset($coin) ? $coin : 1 }}"  class="form-control" placeholder="coin" name="coin">--}}
           {{--</div>--}}
           <div class="form-group">
               <input type="checkbox" value="1" placeholder="coin" name="coin">
               <p class="text-warning">Bạn có thể được mặc định trúng một cặp số</p>
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