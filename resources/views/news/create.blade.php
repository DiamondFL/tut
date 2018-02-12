@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="index.html"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="tables-main.html">Tables</a>
        </li>
        <li class="active">
            <strong>Basic Tables</strong>
        </li>
    </ol>

    <form class="row" action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group col-lg-6">
            <label for="title">{{trans('label.title')}}</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="form-group col-lg-12">
            <label for="intro">{{trans('label.intro')}}</label>
            <textarea type="text" class="form-control ckeditor" name="intro" id="intro"></textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="content">{{trans('label.content')}}</label>
            <textarea type="text" class="form-control ckeditor" name="content" id="content"></textarea>
        </div>
        <div class="form-group col-lg-12">
            <label for="index">{{trans('label.index')}}</label>
            <textarea type="text" class="form-control ckeditor" name="index" id="index"></textarea>
        </div>
        <div class="form-group col-lg-6">
            <label for="views">{{trans('label.views')}}</label>
            <input type="number" class="form-control" name="views" id="views">
        </div>
        <div class="form-group col-lg-6">
            <label for="source">{{trans('label.source')}}</label>
            <input type="text" class="form-control" name="source" id="source">
        </div>
        <div class="form-group col-lg-12">
            <label for="input-tags">{{trans('label.tag')}}</label>
            <input type="text" id="select-to" name="tag" >
        </div>

        <div class="form-group col-lg-6">
            <label for="is_active">{{trans('label.is_active')}}</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="is_active" id="is_active">
                </label>
            </div>
        </div>

        <div class="form-group col-lg-6">
            <label for="is_hot">{{trans('label.is_hot')}}</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="is_hot" id="is_hot">
                </label>
            </div>
        </div>

        <div class="col-lg-12">
            <button class="btn btn-primary">{{trans('button.done')}}</button>
            <a href="{{url()->previous()}}" class="btn btn-default">{{trans('button.cancel')}}</a>
        </div>
    </form>
@endsection
@push('css')
<link rel="stylesheet" href="{{asset('')}}bower_components/selectize/dist/css/selectize.bootstrap3.css">
@endpush
@push('js')
<script src="{{asset('')}}bower_components/sifter/sifter.js"></script>
<script src="{{asset('')}}bower_components/microplugin/src/microplugin.js"></script>
<script src="{{asset('')}}bower_components/selectize/dist/js/selectize.min.js"></script>

<script>
    var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
        '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

    $('#select-to').selectize({
        persist: false,
        maxItems: null,
        valueField: 'email',
        labelField: 'name',
        searchField: ['name', 'email'],
        options: [
            {email: 'brian@thirdroute.com', name: 'Brian Reavis'},
            {email: 'nikola@tesla.com', name: 'Nikola Tesla'},
            {email: 'someone@gmail.com'}
        ],
        render: {
            item: function(item, escape) {
                return '<div>' +
                    (item.name ? '<span class="name">' + escape(item.name) + '</span>' : '') +
                    (item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
                    '</div>';
            },
            option: function(item, escape) {
                var label = item.name || item.email;
                var caption = item.name ? item.email : null;
                return '<div>' +
                    '<span class="label">' + escape(label) + '</span>' +
                    (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                    '</div>';
            }
        },
        createFilter: function(input) {
            var match, regex;

            // email@address.com
            regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
            match = input.match(regex); console.log(match);
            if (match) return !this.options.hasOwnProperty(match[0]);

            // name <email@address.com>
            regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
            match = input.match(regex);
            if (match) return !this.options.hasOwnProperty(match[2]);

            return false;
        },
        create: function(input) {
            if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
                return {email: input};
            }
            var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
            if (match) {
                return {
                    email : match[2],
                    name  : $.trim(match[1])
                };
            }
            alert('Invalid email address.');
            return false;
        }
    });
</script>
@endpush