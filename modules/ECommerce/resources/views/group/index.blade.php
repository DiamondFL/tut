@extends('eco::layout.main')
@section('title')
    Nhóm
@endsection
@section('content')
    @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
    @endif
    @if(isset($group))
        @foreach($group as $value)
            <div class="input-group">
            <span class="input-group-btn ">
                <form action="{{route('group.destroy', $value->id)}}">
                     <button  class="btn-danger btn isDestroy">
                         <span class="glyphicon glyphicon-remove"></span>
                     </button>
                    <a href="{{route('group.edit', $value->id)}}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </form>
            </span>
                <input type="text" name="name" readonly required="" value="{{$value->name}}" class="form-control">
            </div>
        @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
    <a href="{{route('group.create')}}" style="text-decoration: none;color: #f5f5f5">
        <button class=" btn btn-block btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span></button>
    </a>
@endsection
