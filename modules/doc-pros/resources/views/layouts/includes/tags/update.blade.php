<div class="form-group col-lg-12">
    <label for="tags">{{trans('label.tag')}}</label>
    <select class="form-control" name="tags[]" id="tags" multiple>
        @foreach($tagCompose as $id => $name)
            <option @if(in_array($name, $tagNames)) selected @endif value="{{$name}}">{{$name}}</option>
        @endforeach
    </select>
</div>