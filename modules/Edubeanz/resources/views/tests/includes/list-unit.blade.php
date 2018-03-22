@for($i=1; $i <= $count; $i++)
    <div class="col-md-1 form-group col-sm-2 col-xs-3">
        <button data="{{$i}}" class="btn btn-xs btn-default btn-block list-test">
            {{$i}}
        </button>
    </div>
@endfor