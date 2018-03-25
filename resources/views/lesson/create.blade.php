@extends('layouts.app')
@section('content')
<div class="row">
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="/">_name_</a>
        </li>
        <li class="active">
            <strong>Tables</strong>
        </li>
    </ol>

    <form action="{{route('lesson.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        
        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
</div>
@endsection