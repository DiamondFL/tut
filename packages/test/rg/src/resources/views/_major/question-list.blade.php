<div class="col-lg-12">
    <button class="btn btn-primary">
        <i class="fa fa-plus"></i>
    </button>
</div>
<div class="col-lg-12">
    @foreach($questions as $question)
        {!! $question->content !!}
        @foreach($question->replies as $k => $reply)
            {{$k + 1}} : {{ $reply->content }}
        @endforeach
    @endforeach
</div>
