@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('mini-test.index')}}">mini_tests</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div>
    {!! lesson_id !!}
{!! questions !!}
{!! reply1 !!}
{!! reply2 !!}
{!! reply3 !!}
{!! reply4 !!}
{!! answer !!}
{!! is_active !!}
{!! created_by !!}
{!! updated_by !!}

</div>
<a href="{{url()->previous()}}" class="btn btn-default"><i class="fa fa-backward"></i></a>
@endsection