<div class="row text-center">
    @foreach($resultVo as $row)
        <div class="col-xs-6 col-md-3">
            <a class="thumbnail" onclick="speakEnglish('{{$row->word}}')">
                @if(empty($row->image))
                    <img src="{{asset('storage/images/default.ico')}}" alt="">
                @else
                    <img src="{{asset('storage'.str_replace_last('.', '_200_200.', $row->image))}}" alt="">
                @endif
                <h3 data-toggle="tooltip" data-placement="top" title="{{$row->meaning}}">{{$row->word}}</h3>
                <h4>{{$row->pronounce}}</h4>
            </a>
        </div>
    @endforeach
</div>
<div id="vocabularySearchLink">
    {!! $resultVo->links() !!}
</div>
