@for($i=1; $i <= $count; $i++)
    <a href="{{route('involve.multi-choice.test')}}?page={{$i}}" data="{{$i}}" class="list-group-item list-test">
        Bài test số {{$i}}
    </a>
@endfor