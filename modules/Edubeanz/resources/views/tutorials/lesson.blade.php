@extends('edu::layouts.app')
@section('title', 'Tài nguyên của dự án')
@section('container')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb bc-3">
                <li>
                    <a href="/"><i class="fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="{{route('edu.tutorial.index')}}">Tutorial</a>
                </li>
                <li class="active">
                    {{$section->category->name}}
                </li>
                <li class="active">
                    {{$section->name}}
                </li>
                <li class="active">
                    <strong>Lesson</strong>
                </li>
            </ol>
            <h3 class="text-info">{{$lesson->title}}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 text-justify">
            <div class="panel panel-primary" data-collapsed="0">

                <!-- panel head -->
                {{--<div class="panel-heading">--}}
                    {{--<div class="panel-title"><h3><strong></strong></h3></div>--}}

                {{--</div>--}}

                <!-- panel body -->
                <div class="panel-body">

                    {!! $lesson->intro !!}
                    {!! $lesson->content !!}
                </div>

            </div>
            <div id="comments-container">

            </div>
        </div>
        <div class="col-lg-3">
            <ul class="list-group">
                <li class="list-group-item text-info"><strong>{{$section->name}}</strong></li>
                @foreach($lessonList as $id => $name)
                <li class="list-group-item">
                    <a class="{{$lesson->id == $id ? 'text-danger' : ''}}" href="{{route('edu.tutorial.lesson', $id)}}">{{$name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Footer Widgets -->
@endsection
@push('head')
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/jquery-comments')}}/css/jquery-comments.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/neon-core.css">
@endpush
@push('js')
    <script src="{{asset('')}}assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>--}}
    <script type="text/javascript" src="{{asset('bower_components/jquery-comments')}}/js/jquery-comments.js"></script>
    <script src="{{asset('')}}assets/js/neon-api.js"></script>
    <script src="{{asset('')}}assets/js/neon-demo.js"></script>
    <script src="{{asset('')}}assets/js/neon-chat.js"></script>
    <script>
        $('#comments-container').comments({
            profilePictureURL: 'https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-1/c32.0.160.160/p160x160/1380823_171886979683724_704506767_n.jpg?_nc_cat=0&_nc_eui2=v1%3AAeFXDAC3ije9Jead1P3i12jIH-WOkLc6KLHvjQvtZ9Cg4r4TMo2_tBRp1KsLxbmSXCcH554nKt677VMvmLHgWRh3jMQPOI9ZG__HFXoUrW-RXQ&oh=b383a9ebb0a4c16593ba1d333ed0145e&oe=5B30E0E4',
            getComments: function(success, error) {
                $.ajax({
                    type: 'get',
                    url: '{{route('lesson-comment-api.index')}}',
                    success: function(commentsArray) {
                        console.log(commentsArray)
                        success(commentsArray.data)
                    },
                    error: error
                });
            },
            getUsers: function(success, error) {
                $.ajax({
                    type: 'get',
                    url: '/api/users/',
                    success: function(userArray) {
                        console.log('-------------User array---------------')
                        console.log(userArray)
                        success(userArray)
                    },
                    error: error
                });
            },
            postComment: function(commentJSON, success, error) {
                console.log('create comment')
                console.log(commentJSON)
                $.ajax({
                    type: 'post',
                    url: '{{route('lesson-comment-api.store')}}',
                    data: commentJSON,
                    success: function(comment) {
                        success(comment)
                    },
                    error: error
                });
            },
            putComment: function(commentJSON, success, error) {
                $.ajax({
                    type: 'put',
                    url: '{{route('lesson-comment-api.index')}}' + commentJSON.id,
                    data: commentJSON,
                    success: function(comment) {
                        success(comment)
                    },
                    error: error
                });
            },
            deleteComment: function(commentJSON, success, error) {
                $.ajax({
                    type: 'delete',
                    url: '{{route('lesson-comment-api.index')}}' + commentJSON.id,
                    success: success,
                    error: error
                });
            },
            upvoteComment: function(commentJSON, success, error) {
                var commentURL = '/api/comments/' + commentJSON.id;
                var upvotesURL = commentURL + '/upvotes/';

                if(commentJSON.userHasUpvoted) {
                    $.ajax({
                        type: 'post',
                        url: upvotesURL,
                        data: {
                            comment: commentJSON.id
                        },
                        success: function() {
                            success(commentJSON)
                        },
                        error: error
                    });
                } else {
                    $.ajax({
                        type: 'delete',
                        url: upvotesURL + upvoteId,
                        success: function() {
                            success(commentJSON)
                        },
                        error: error
                    });
                }
            }
        });
    </script>
@endpush