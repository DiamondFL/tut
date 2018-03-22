@foreach($vocabularies as $vocabulary)
    <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
            @if(trim($vocabulary->image) ==!'')
                <img class="img-responsive" src="{{asset('storage'.str_replace_last('.', '_100_100.', $vocabulary->image))}}" alt="">
            @else
                <img class="img-responsive" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Symbole_du_clan_Nara.svg/500px-Symbole_du_clan_Nara.svg.png" alt="">
            @endif
            <div class="caption">
                <h3 >
                    <span data-toggle="tooltip" data-placement="top" title="{{$vocabulary->meaning}}" >
                        {{$vocabulary->word}}
                    </span>
                    <button type="button" class="btn btn-info btn-sm pull-right" onclick="speakEnglish('{{$vocabulary->word}}')">
                        <i class="entypo-megaphone"></i>
                    </button>
                </h3>
                <p>{{$vocabulary->pronounce}}</p>
                {{--<p>{{$vocabulary->meaning}}</p>--}}
                {{--                <p>{{$vocabulary->type}}</p>--}}
            </div>
        </div>
    </div>
@endforeach
<div id="linkPaginate">
    {!! $vocabularies->links() !!}
</div>