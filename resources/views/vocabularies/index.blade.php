@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/home"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a>Vocabulary</a>
        </li>
        <li class="active">
            <strong>Table</strong>
        </li>
    </ol>
    <form class="form-group row" id="formFilter" action="{{route('vocabularies.index')}}" method="POST">
        {{--<div class="col-sm-2 form-group">--}}
            {{--<select name="per_page" class="form-control inputFilter">--}}
                {{--<option value="10">10</option>--}}
                {{--<option value="20">20</option>--}}
                {{--<option value="30">30</option>--}}
                {{--<option value="40">40</option>--}}
                {{--<option value="50">50</option>--}}
            {{--</select>--}}
        {{--</div>--}}
        <div class="col-sm-3 form-group">
            <input type="text" name="word" class="form-control inputFilter" placeholder="word">
        </div>
        <div class="col-sm-2 form-group">
            <input type="text" name="type" class="form-control inputFilter" placeholder="type">
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="meaning" class="form-control inputFilter" placeholder="meaning">
        </div>
        <div class="col-sm-2 form-group">
            <select name="is_active" class="form-control selectFilter">
                <option value="">All</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a class="btn btn-primary form-group" href="{{route('vocabularies.create')}}"><i class="fa fa-plus"></i></a>
                </div>
                <div class="btn-group" role="group">
                    <input type="file" route="{{route('involve.vocabulary.import')}}"
                           id="importFile" name="file"
                           class="form-group form-control file2 inline btn btn-success"
                           data-label="<i class='fa fa-upload'></i> "/>
                </div>
                <div class="btn-group" role="group">
                    <span class="btn btn-info form-group"><i class="glyphicon glyphicon-export"></i></span>
                </div>
            </div>
        </div>
    </form>

    <div class="box-content nopadding" id="table">
        @include('vocabularies.table')
    </div>
@endsection

@push('js')
<script src="{{asset('build/form-filter.js')}}"></script>
<script>
    function speakEnglish(word) {
        var audio = new Audio();
        audio.src = 'http://api.voicerss.org/?key=bee4f91027d94f44b523d7bbfea9d2a1&hl=en-gb&c=mp3&f=32khz_16bit_mono&src=' + word;
        audio.play();
    }
    var wordTranslate = $('#wordTranslate');
    function selectLanguage() {
        var language = $('input:radio[name="language"]:checked').val();
        if (language === 1) {
            $('#speakEnglish').hide();
        } else {
            $('#speakEnglish').show();
        }
    }
    function listenOnly() {
        var word = wordTranslate.val().trim();
        if (word === '') {
            wordTranslate.val('');
            wordTranslate.focus();
            wordTranslate.attr('placeholder', 'Please key down word ...');
        } else {
            speakEnglish(word);
        }
    }
    function translateWord() {
        var word = wordTranslate.val().trim();
        var language = $('input:radio[name="language"]:checked').val();
        console.log(language);
        if (word === '') {
            wordTranslate.val('');
            wordTranslate.focus();
            wordTranslate.attr('placeholder', 'Please key down word ...');
        } else if (language === 0) {
            window.open('https://translate.google.com/?text=section#en/vi/' + word, "popupWindow", "width=900,height=400,scrollbars=yes");
        } else {
            window.open('https://translate.google.com/?text=section#vi/en/' + word, "popupWindow", "width=900,height=400,scrollbars=yes");
        }
    }
</script>
@endpush