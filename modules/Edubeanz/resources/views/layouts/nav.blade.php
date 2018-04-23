<nav class="site-nav">
    <ul class="main-menu hidden-xs" id="main-menu">
        <li class="active">
            <a href="/">
                <span><i class="entypo-home"></i></span>
            </a>
        </li>
        <li>
            <a>
                <span>Dự án</span>
            </a>
            <ul>
                @foreach($projectCompose as $id => $name)
                    <li>
                        <a href="#{{$id}}">
                            <span>{{$name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{route('edu.doc.index')}}">
                <span>Document</span>
            </a>
        </li>
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
            {{--<a href="{{route('contact')}}">--}}
                {{--<span>Liên hệ</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        @if(auth()->check())
            <li class="dropdown pull-right">
                <strong>{{ auth()->user()->last_name }} <span style="color: goldenrod">{{(number_format(auth()->user()->coin) . ' COIN')}}</span></strong>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                    <i class="entypo-user"></i>
                </a>
                <ul class="dropdown-menu text-center">
                    <li>
                        <a href="{{route('acl.profile')}}">
                            <i class="entypo-user"></i> Profile
                        </a>
                    </li>
                    <li >
                        <form method="post" action="{{route('logout')}}">
                            {!! csrf_field() !!}
                            <button class="btn btn-xs btn-block">
                                <i class="entypo-logout"></i>Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <li>
                <a href="{{asset('login')}}"><span class="entypo-login"></span></a>
                <a href="{{asset('register')}}"><span class="entypo-user-add"></span></a>
            </li>
        @endif

    </ul>
    <div class="visible-xs">
        <a href="#" class="menu-trigger">
            <i class="entypo-menu"></i>
        </a>
    </div>
</nav>