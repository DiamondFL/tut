@extends('edu::layouts.app')

@section('container')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li class="active">
            <strong>{{__('table.tutorial_results')}}</strong>
        </li>
    </ol>
        <table class="table">
            <tr>
                <th>{{trans('label.tutorial_id')}}</th>
                <th>{{trans('label.score')}}</th>
                <th>{{trans('label.created_at')}}</th>
                <th></th>
            </tr>
            @foreach($tutorialResults as $row)
                <tr>
                    <td>{{$row->tutorial? $row->tutorial->name : ''}}</td>
                    <td>{{$row->score}}</td>
                    <td>{{$row->created_at}}</td>
                </tr>
            @endforeach
        </table>

        <div id="linkPaginate">
            {{$tutorialResults->links()}}
        </div>
@endsection
@push('css')
    <link rel="stylesheet"
          href="<?php echo e(asset('')); ?>bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
@endpush
@push('js')
    <script type="text/javascript" src="<?php echo e(asset('')); ?>bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript"
            src="<?php echo e(asset('')); ?>bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{asset('js/test-case-index.js')}}"></script>
    <script type="text/javascript">
        $("#birthday").datetimepicker({format: 'YYYY-MM-DD'});
    </script>
@endpush