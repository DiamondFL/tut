@extends('eco::layout.main')
@section('title')
Công việc
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @if(isset($work))
    @foreach($work as $value)
        <div class="input-group">
            <span class="input-group-btn " >
                <a href="{{asset('')}}wk/delete-work/{{$value->id}}" class="btn-danger btn"><span class="glyphicon glyphicon-remove"></span></a>
                <a href="{{asset('')}}wk/update-work/{{$value->id}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
            </span>
          <input type="text" name="workName" readonly required="" value="{{$value->workName}}" class="form-control">
        </div>
    @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
    <a href="{{asset('')}}wk/add-work" style="text-decoration: none;color: #f5f5f5">
        <button class=" btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span></button>
    </a>
@endsection
