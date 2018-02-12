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

    <form id="formFilter" action="{{route('involve.multi-choice.getListTest')}}" method="POST">
        <div class="form-group col-sm-3">
            <label for="">Level</label>
            <select class="form-control selectFilter" name="level" id="">
                <option value="">All</option>
                @foreach(LEVEL as $k => $v)
                <option value="{{$k}}">{{$k}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="">Knowledge</label>
            <select class="form-control selectFilter" name="knowledge" id="">
                <option value="">All</option>
                @foreach(KNOWLEDGE as $k =>$v)
                    <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label for="">Professional</label>
            <select class="form-control selectFilter" name="professional" id="">
                <option value="">All</option>
                @foreach(PROFESSIONAL as $k => $v)
                    <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="col-sm-12">
        <form action="{{route('involve.multi-choice.test')}}" method="GET" id="doTesting">
            <input type="hidden" name="level">
            <input type="hidden" name="knowledge">
            <input type="hidden" name="professional">
            <input type="hidden" name="page">
            <ul class="list-group" id="table">
                @include('multi-choices.is-lists')
            </ul>
        </form>
    </div>

@endsection
@push('css')

@endpush
@push('js')
    <script src="{{asset('')}}build/form-filter.js"></script>
    <script>
        var doTesting = $('#doTesting');
        var selectFilter = $('.selectFilter');

        selectFilter.change(function () {
           var name = $(this).attr('name');
           var value = $(this).val();
           $('input[name="' + name + '"]').val(value);
        });

        $(document).on('click', '.list-test', function (e) {
           e.preventDefault();
           var data = $(this).attr('data');
           $('input[name="page"]').val(data);
           //doTesting.attr('action', href);
           doTesting.submit();
        });
    </script>
@endpush