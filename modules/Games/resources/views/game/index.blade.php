@extends('edu::layouts.app')
@section('title', 'GAMES')
@section('container')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <a href="{{route('parity.index')}}" class="thumbnail">
                <img src="{{asset('img/games/parity.jpg')}}" class="img-responsive" alt="parity">
            </a>
            <div class="caption text-center">
                <h3>Tài Xỉu</h3>
                <p>Chơi 1 ăn 2</p>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="{{route('guess.index')}}" class="thumbnail">
                <img src="{{asset('img/games/guess.jpg')}}" class="img-responsive" alt="guess">
            </a>
            <div class="caption text-center">
                <h3>Đoán xí ngầu</h3>
                <p>Chơi 1 ăn 5</p>
             </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="{{route('lott.index')}}" class="thumbnail">
                <img src="{{asset('img/games/lott.jpg')}}" class="img-responsive" alt="guess">
            </a>
            <div class="caption text-center">
                <h3>Portal lott</h3>
                <p>1 tỉ coin chờ đợi</p>
             </div>
        </div>
        {{--<div class="col-xs-12 col-md-6">--}}
            {{--<a href="{{route('lott.index')}}" class="thumbnail">--}}
                {{--<img src="{{asset('img/games/12GodGreek/intro.jpg')}}" class="img-responsive" alt="guess">--}}
            {{--</a>--}}
            {{--<div class="caption text-center">--}}
                {{--<h3>12 vị thần hy lạp</h3>--}}
                {{--<p>1 ăn 10</p>--}}
             {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-12 col-md-6">--}}
            {{--<a href="{{route('lott.index')}}" class="thumbnail">--}}
                {{--<img src="{{asset('img/games/12Zodiac/intro1.jpg')}}" class="img-responsive" alt="guess">--}}
            {{--</a>--}}
            {{--<div class="caption text-center">--}}
                {{--<h3>12 cung hoàng đạo</h3>--}}
                {{--<p>1 ăn 10</p>--}}
             {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-12 col-md-6">--}}
            {{--<a href="{{route('lott.index')}}" class="thumbnail">--}}
                {{--<img src="{{asset('img/games/lott.jpg')}}" class="img-responsive" alt="guess">--}}
            {{--</a>--}}
            {{--<div class="caption text-center">--}}
                {{--<h3>12 con giáp</h3>--}}
                {{--<p>1 ăn 10</p>--}}
             {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
@push('head')

@endpush
@push('js')

@endpush


