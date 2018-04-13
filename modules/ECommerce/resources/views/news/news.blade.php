@extends('layout.main')
@section('title')
Tin tức
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @if(isset($news))
    @foreach($news as $value)
        <div class="input-group">
            <span class="input-group-btn " >
                <a href="{{asset('')}}news/delete-news/{{$value->id}}" class="btn-danger btn"><span class="glyphicon glyphicon-remove"></span></a>
                <a href="{{asset('')}}news/update-news/{{$value->id}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
            </span>
          <input type="text" name="name" readonly required="" value="{{$value->title}}" class="form-control">
        </div>
    @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
    <a href="{{asset('')}}news/add-news" style="text-decoration: none;color: #f5f5f5">
        <button class=" btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span></button>
    </a>
@endsection