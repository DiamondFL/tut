@extends('layouts.app')
@section('content')
    <div class="form-group">
        <div class="alert alert-info" role="alert" id="">
            {{$mini_multi_choice->question}}
            <input type="checkbox" class="unsure" data-toggle="tooltip" data-placement="bottom"
                   title="Bạn chưa chắc chắn ">
        </div>
        @if($mini_multi_choice->answer > 5)
            <div>
                <div class="input-group ">
                          <span class="input-group-addon">
                            <input type="checkbox" value="1" class="done" name="answer{{$mini_multi_choice->id}}[]">
                          </span>
                    <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply1}}">
                </div>
                <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" value="2" class="done" name="answer{{$mini_multi_choice->id}}[]">
                          </span>
                    <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply2}}">
                </div>
                @if(trim($mini_multi_choice->reply3) !== '')
                    <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" value="3" class="done" name="answer{{$mini_multi_choice->id}}[]">
                              </span>
                        <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply3}}">
                    </div>
                @endif
                @if(trim($mini_multi_choice->reply4) !== '')
                    <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" value="4" class="done" name="answer{{$mini_multi_choice->id}}[]">
                              </span>
                        <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply4}}">
                    </div>
                @endif
                @if(trim($mini_multi_choice->reply5) !== '')
                    <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" value="5" class="done" name="answer{{$mini_multi_choice->id}}[]">
                              </span>
                        <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply5}}">
                    </div>
                @endif
            </div>
        @else
            <div>
                <div class="input-group">
                          <span class="input-group-addon">
                            <input type="radio" value="1" class="done" name="answer{{$mini_multi_choice->id}}">
                          </span>
                    <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply1}}">
                    <span class="input-group-addon">
                            <i class="fa fa-check"> check </i>
                        </span>
                </div>
                <div class="input-group">
                          <span class="input-group-addon">
                            <input type="radio" value="2" class="done" name="answer{{$mini_multi_choice->id}}">
                          </span>
                    <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply2}}">
                </div>
                @if(trim($mini_multi_choice->reply3) !== '')
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="radio" value="3" class="done" name="answer{{$mini_multi_choice->id}}">
                          </span>
                        <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply3}}">
                    </div>
                @endif
                @if(trim($mini_multi_choice->reply4) !== '')
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="radio" value="4" class="done" name="answer{{$mini_multi_choice->id}}">
                          </span>
                        <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply4}}">
                    </div>
                @endif
                @if(trim($mini_multi_choice->reply5) !== '')
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="radio" value="5" class="done" name="answer{{$mini_multi_choice->id}}">
                          </span>
                        <input type="text" readonly class="form-control" value="{{$mini_multi_choice->reply5}}">
                    </div>
                @endif
            </div>
        @endif

        <div class="input-group">
              <span class="input-group-addon">
                Answer
              </span>
            <input type="text" readonly class="form-control" value="{{$mini_multi_choice->answer}}">
        </div>

    </div>
    <a class="btn btn-default" href="{{url()->previous() }}"><i class="fa fa-forward"></i></a>
@endsection