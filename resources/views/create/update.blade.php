@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title">{{trans('title.create')}}</div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('create.update', $create->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            
            <div class="col-lg-12">
                <button class="btn btn-primary">{{trans('button.done')}}</button>
                <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection