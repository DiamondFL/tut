@extends('eco::layout.main')
@section('title')
Xem báo cáo
@stop
@section('content')
    @if(isset($data))
    @foreach($data as $value)
        <div class="input-group">
            <span class="input-group-btn " >
                <a href="{{asset('')}}rp/delete-report/{{$value->id}}" class="btn-danger btn">Xóa</a>
                <a href="{{asset('')}}rp/view-report/{{$value->id}}" class="btn btn-warning">Xem</a>
            </span>
          <input type="text" name="reportName" readonly required="" value="{{Works::where('id',Jobs::where('id',$value->jobs_id)->pluck('work_id'))->pluck('workName')}}" class="form-control">
        </div>
    @endforeach
    @else
        Hiện tại dữ liệu trống.
    @endif
@endsection