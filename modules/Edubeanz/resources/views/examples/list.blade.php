@extends('edu::layouts.app')
@section('title', 'Tài nguyên của dự án')
@section('container')
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="blog-posts">
                        @include('edu::examples.includes.paginate')
                        <!-- Blog Post -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- List Sidebar -->
                    <div class="sidebar">
                        <h3>
                            <i class="entypo-list"></i>
                            Categories
                        </h3>
                        <div class="sidebar-content">
                            <ul>
                                <li>
                                    <a href="#">Art Direction <span>(3)</span></a>
                                </li>
                                <li>
                                    <a href="#">Photography <span>(7)</span></a>
                                </li>
                                <li>
                                    <a href="#">3D Modelling <span>(5)</span></a>
                                </li>
                                <li>
                                    <a href="#">Web Design <span>(1)</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Comments Sidebar -->
                    {{--<div class="sidebar">--}}
                        {{--<h3>--}}
                            {{--<i class="entypo-chat"></i>--}}
                            {{--Recent Comments--}}
                        {{--</h3>--}}
                        {{--<div class="sidebar-content">--}}
                            {{--<ul class="discussion-list">--}}
                                {{--<li>--}}
                                    {{--<a href="#" class="thumb">--}}
                                        {{--<img src="{{asset('frontd')}}/images/user-icon-1.png" width="43"--}}
                                             {{--class="img-circle"/>--}}
                                    {{--</a>--}}
                                    {{--<div class="details">--}}
                                        {{--<a href="#">John Doe</a>--}}
                                        {{--<p>At vero eos et accusamus et iusto odio dignissimos...</p>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#" class="thumb">--}}
                                        {{--<img src="{{asset('frontd')}}/images/user-icon-1.png" width="43"--}}
                                             {{--class="img-circle"/>--}}
                                    {{--</a>--}}
                                    {{--<div class="details">--}}
                                        {{--<a href="#">John Doe</a>--}}
                                        {{--<p>At vero eos et accusamus et iusto odio dignissimos...</p>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#" class="thumb">--}}
                                        {{--<img src="{{asset('frontd')}}/images/user-icon-1.png" width="43"--}}
                                             {{--class="img-circle"/>--}}
                                    {{--</a>--}}
                                    {{--<div class="details">--}}
                                        {{--<a href="#">John Doe</a>--}}
                                        {{--<p>At vero eos et accusamus et iusto odio dignissimos...</p>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Widgets -->
@endsection