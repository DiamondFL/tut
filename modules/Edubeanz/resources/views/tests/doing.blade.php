@extends('edu::layouts.app')
@section('title', 'Bạn đang bài làm')
@section('container')
    <form id="formTest" action="{{route('edu.test.marking')}}?page={{$questions->currentPage()}}"
          method="POST">
        {{csrf_field()}}
        <input type="hidden" name="level" value="{{isset($level)?$level:''}}">
        <input type="hidden" name="knowledge" value="{{isset($knowledge)?$knowledge:''}}">
        <input type="hidden" name="professional" value="{{isset($professional)?$professional:''}}">
        @foreach($questions as $k=> $question)
            <div class="form-group" id="{{$k+1}}">
                <strong>Question {{++$k}}</strong>
                <input type="checkbox" data="{{$k}}" class="unsure pull-right" data-toggle="tooltip" data-placement="bottom" title="Bạn chưa chắc chắn ">
            </div>
            <div class="form-group text-info" >{!! trim(strip_tags($question->question)) !!}</div>
            <table class="table">
                @if($question->answer > 5)
                    @foreach(REP_LIST as $i => $rep)
                        @if(trim($question->$rep) !== '')
                            <tr>
                                <td width="20px">
                                    <input type="checkbox" value="{{$i}}" class="done" data="{{$k}}" name="answer{{$question->id}}[]"></td>
                                <td>{{trim($question->$rep)}}</td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    @foreach(REP_LIST as $i => $rep)
                        @if(trim($question->$rep) !== '')
                            <tr>
                                <td width="20px">
                                    <input type="radio" value="{{$i}}" class="done" data="{{$k}}" name="answer{{$question->id}}">
                                </td>
                                <td>{{trim($question->$rep)}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </table>
            <hr>
        @endforeach
    </form>
    <div class="modal fade doing" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tình trạng làm bài </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @for($i=1; $i<= 60; $i++)
                            <div class="col-sm-2 col-xs-2 col-md-1 form-group">
                                <a href="#{{$i}}" id="check{{$i}}" class="btn btn-sm btn-default btn-block">{{$i}}</a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
            <ul class="navbar-form navbar-right">
                <button type="button" class="btn btn-primary" onclick="mark()">
                    Nộp bài
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".doing">Tình trạng làm bài
                </button>
            </ul>
        </div>
    </nav>
@endsection

@push('head')
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
        function mark() {
            var ok = confirm('Bạn thực sự muốn nộp bài');
            if(ok) {
                $('#formTest').mit()
            }
        }
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