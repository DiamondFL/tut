@extends('layouts.app')
@section('title')
    Marked
@endsection
@section('content')
    <form id="formTest" action="{{route('involve.multi-choice.marking')}}?page={{$questions->currentPage()}}"
          method="POST">
        {{csrf_field()}}
        @foreach($questions as $k=> $question)
            <div class="form-group" id="{{$k+1}}">
                <strong>Question {{++$k}}</strong>
                <input type="checkbox" data="{{$k}}" class="unsure pull-right" data-toggle="tooltip"
                       data-placement="bottom" title="Bạn chưa chắc chắn ">
            </div>
            <div class="form-group text-info">{!! $question->question !!}</div>
            <table class="table">
            @if(isset($replies[$answer = 'answer' . $question->id]))
                @if((int)trim($question->answer) > 5)
                    @foreach(REP_LIST as $i => $rep)
                        @if(trim($question->$rep) !== '')
                            <tr class="@if(strpos(is_array($replies[$answer]) ? implode('', $replies[$answer]) : $replies[$answer], $i) !== false) bg-success @endif">
                                <td width="20px">
                                    <input type="checkbox" value="{{$i}}" class="done" data="{{$k}}"
                                        @if(strpos(is_array($replies[$answer]) ? implode('', $replies[$answer]) : $replies[$answer], $i) !== false)
                                            checked
                                        @endif
                                            name="answer{{$question->id}}[]">
                                </td>
                                <td>{{$question->$rep}}</td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    @foreach(REP_LIST as $i => $rep)
                        @if(trim($question->$rep) !== '')
                            <tr class="@if($question->answer == $i) bg-success @endif">
                                <td width="20px">
                                    <input type="radio" value="{{$i}}"
                                           @if($replies[$answer] == $i) checked @endif  name="answer{{$question->id}}">
                                </td>
                                <td>{{$question->$rep}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @else
                @if($question->answer > 5)
                    @foreach(REP_LIST as $i => $rep)
                        @if(trim($question->$rep) !== '')
                            <tr class="@if(isset($replies[$answer]) && strpos(is_array($replies[$answer]) ?
                            implode('', $replies[$answer]):$replies[$answer], $i) !== false) bg-success @endif">
                                <td width="20px">
                                    <input type="checkbox" value="1" name="answer{{$question->id}}[]">
                                </td>
                                <td>{{$question->$rep}}</td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    @foreach(REP_LIST as $i => $rep)
                        @if(trim($question->$rep) !== '')
                            <tr>
                                <td width="20px">
                                    <input type="radio" value="{{$i}}" name="answer{{$question->id}}">
                                </td>
                                <td>{{$question->$rep}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endif
            </table>
            <hr>
        @endforeach
    </form>
    <div class="modal fade doing" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tình trạng làm bài </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach($questions as $k=> $question)
                            <div class="col-sm-2 col-xs-2 col-md-1 form-group">
                                @if(isset($replies[$answer = 'answer' . $question->id]))
                                    <a href="#{{++$k}}" class="btn btn-sm
                                        @if($replies[$answer] == $question->answer)
                                            btn-success
                                        @else btn-danger destroyBtn @endif btn-block">{{$k}}</a>
                                @else
                                    <a href="#{{++$k}}" class="btn btn-sm  btn-default btn-block">{{$k}}</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
            <ul class="navbar-form navbar-right">
                <button type="button" class="btn btn-primary" onclick="$('#formTest').submit()">
                    Nộp bài
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".doing">Tình trạng làm bài
                </button>
            </ul>
        </div>
    </nav>
@endsection
@push('css')
    <style>
        .unsure {
            height: 20px;
            width: 20px;
            margin-bottom: 0 !important;
        }
        #formTest {
            color:black;
        }
    </style>
@endpush
@push('js')
    <script>
        $('body').bind('beforeunload', function (e) {
            e.preventDefault();
        });
        $(window).on('beforeunload', function (e) {
            e.preventDefault();
        });
        $('.unsure').change(function () {
            var id = $(this).attr('data');
            var check = '#check' + id;
            if ($(this).is(":checked")) {
                $('.done').each(function () {
                    if ($(this).attr('data') === id && $(this).is(":checked")) {
                        $(check).removeClass('btn-default');
                        $(check).removeClass('btn-info');
                        $(check).addClass('btn-warning');
                        return false;
                    } else {
                        $(check).removeClass('btn-default');
                        $(check).removeClass('btn-info');
                        $(check).addClass('btn-danger destroyBtn');
                    }
                })
            } else {
                $('.done').each(function () {
                    if ($(this).attr('data') === id && $(this).is(":checked")) {
                        $(check).removeClass('btn-danger destroyBtn');
                        $(check).removeClass('btn-warning');
                        $(check).addClass('btn-info');
                        return false;
                    } else {
                        $(check).removeClass('btn-danger destroyBtn');
                        $(check).removeClass('btn-info');
                        $(check).addClass('btn-default');
                    }
                })
            }
        });
        $('.done').change(function () {
            var id = $(this).attr('data');
            var check = '#check' + id;
            if ($(this).is(":checked")) {
                $('.unsure').each(function () {
                    if ($(this).attr('data') === id && $(this).is(":checked")) {
                        $(check).removeClass('btn-info');
                        $(check).removeClass('btn-default');
                        $(check).removeClass('btn-danger destroyBtn');
                        $(check).addClass('btn-warning');
                        return false;
                    } else {
                        $(check).removeClass('btn-info');
                        $(check).removeClass('btn-default');
                        $(check).removeClass('btn-danger destroyBtn');
                        $(check).addClass('btn-info');
                    }
                });
            }
            else {
                $('.unsure').each(function () {
                    if ($(this).attr('data') === id && $(this).is(":checked")) {
                        $(check).removeClass('btn-info');
                        $(check).removeClass('btn-danger destroyBtn');
                        $(check).removeClass('btn-warning');
                        $(check).addClass('btn-default');
                        return false;
                    } else {
                        $(check).removeClass('btn-info');
                        $(check).removeClass('btn-danger destroyBtn');
                        $(check).removeClass('btn-warning');
                        $(check).addClass('btn-default');
                    }
                });
            }
        })
    </script>
@endpush