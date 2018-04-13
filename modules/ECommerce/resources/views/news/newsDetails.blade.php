@extends('layout.main')
@section('title')
Tin tức
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($news->count())
                    <h3>{{$news ->title}}</h3>
                    <p>{{$news ->intro}}</p>
                    <hr>
                    <p>{{$news ->details}}</p>
                    <hr>
                    <p><strong>Ngày viết: </strong>{{$news->created_at}}</p>
            @else
                Nhóm trống bạn không thể thêm dữ liệu
            @endif
        </div>
    </div>

@stop