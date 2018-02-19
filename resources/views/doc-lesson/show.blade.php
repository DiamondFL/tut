@extends('layouts.app')
@section('content')
<ol class="breadcrumb bc-3">
    <li>
        <a href="/"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="{{route('doc-lesson.index')}}">doc_lessons</a>
    </li>
    <li class="active">
        <strong>Table</strong>
    </li>
</ol>
<div>
    {!! title !!}
{!! intro !!}
{!! content !!}
{!! sub_category_id !!}
{!! views !!}
{!! last_view !!}
{!! created_by !!}
{!! updated_by !!}

</div>
<a href="{{url()->previous()}}" class="btn btn-default"><i class="fa fa-backward"></i></a>
@endsection