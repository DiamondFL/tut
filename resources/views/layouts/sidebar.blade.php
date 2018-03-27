<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <div class="logo">
                <a href="/">
                    <h2><strong>Edubeanz</strong></h2>
                </a>
            </div>
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <i class="entypo-menu"></i>
                </a>
            </div>
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">
            @include('doc::layouts.sidebar')
            <li>
                <a href="{{route('vocabularies.index')}}">
                    <i class="entypo-inbox"></i>
                    <span class="title">Vocabulary</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{route('news.index')}}">--}}
                    {{--<i class="entypo-newspaper"></i>--}}
                    {{--<span class="title">News</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{route('multi_choices.index')}}">
                    <i class="entypo-newspaper"></i>
                    <span class="title">Multi choices</span>
                </a>
            </li>
            <li>
                <a href="{{route('subjects.index')}}">
                    <i class="entypo-newspaper"></i>
                    <span class="title">Subject</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{route('involve.multi-choice.getListTest')}}">--}}
                    {{--<i class="entypo-newspaper"></i>--}}
                    {{--<span class="title">List Test</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{route('scores.index')}}">--}}
                    {{--<i class="entypo-newspaper"></i>--}}
                    {{--<span class="title">Score</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{route('tags.index')}}">--}}
                    {{--<i class="entypo-tag"></i>--}}
                    {{--<span class="title">Tag</span>--}}
                {{--</a>--}}
            {{--</li>--}}
{{--            @include('trg::layouts.sidebar')--}}
            @include('organ::layouts.sidebar')
            @include('acl::layouts.nav')
            @include('magic::layouts.sidebar')
            @include('tut::layouts.sidebar')
        </ul>
    </div>
</div>