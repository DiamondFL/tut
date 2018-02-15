@extends('edu::layouts.app')
@section('title')
    Danh sách kiểm tra năng lực
@endsection
@section('container')
    <h3><strong>Kiểm tra kiến thức công nghệ thông tin</strong></h3>
    <p><i>Thông qua bài kiểm tra có thể đánh giá được phần nào năng lực hiện có của bạn trong kho kiến thức của chúng tôi.
            Hãy lựa chọn nền tảng kiến thức phù hợp với bạn nhất</i></p>
    <form class="row" id="formFilter" action="{{route('edu.test.list')}}" method="POST">
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
    <p><i>Nếu đã sẵn sàng hãy chọn trong danh sách bài kiểm tra dưới đây và bắt đầu làm bài</i></p>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{route('edu.test.doing')}}" method="GET" id="doTesting">
                <input type="hidden" name="level">
                <input type="hidden" name="knowledge">
                <input type="hidden" name="professional">
                <input type="hidden" name="page">
            </form>
        </div>
        <div class="" id="table">
            @include('edu::tests.includes.list-unit')
        </div>
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
