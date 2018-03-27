<nav class="site-nav">
    <ul class="main-menu hidden-xs" id="main-menu">
        <li class="active">
            <a href="/">
                <span><i class="entypo-home"></i></span>
            </a>
        </li>
        {{--<li>--}}
            {{--<a>--}}
                {{--<span>Dự án</span>--}}
            {{--</a>--}}
            {{--<ul>--}}
                {{--@foreach($projectCompose as $id => $name)--}}
                    {{--<li>--}}
                        {{--<a href="#{{$id}}">--}}
                            {{--<span>{{$name}}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
               {{--@endforeach--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li>
            <a href="{{route('edu.tutorial.index')}}">
                <span>Tutorial</span>
            </a>
        </li>
        <li>
            <a href="{{route('edu.test.list')}}">
                <span>Test</span>
            </a>
        </li>
        <li>
            <a href="{{route('game.index')}}">
                <span>Game</span>
            </a>
        </li>
        {{--<li>--}}
            {{--<a href="{{route('edu.language.list')}}">--}}
                {{--<span>English</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="{{route('edu.example.list')}}">--}}
                {{--<span>Blog</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="{{route('contact')}}">--}}
                {{--<span>Liên hệ</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li>
            @if(auth()->check())
            <a class="text-info">
{{--                {{auth()->user()->email}}--}}
                <strong style="color: goldenrod">{{number_format(auth()->user()->coin)}} COIN</strong>
            </a>
            @else
            <a href="{{asset('login')}}" ><span class="entypo-login"></span></a>
            <a href="{{asset('register')}}" ><span class="entypo-user-add"></span></a>
            @endif
        </li>
    </ul>
    <div class="visible-xs">
        <a href="#" class="menu-trigger">
            <i class="entypo-menu"></i>
        </a>
    </div>
</nav>