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
            <a href="{{route('edu.test.list')}}">
                <span>Test</span>
            </a>
        </li>
        <li>
            <a href="{{route('edu.language.list')}}">
                <span>English</span>
            </a>
        </li>
        <li>
            <a href="{{route('edu.example.list')}}">
                <span>Blog</span>
            </a>
        </li>
        <li>
            <a href="{{route('contact')}}">
                <span>Liên hệ</span>
            </a>
        </li>
        <li>
            <a href="/login" ><span class="entypo-login"></span></a>
            <a href="/register" ><span class="entypo-user-add"></span></a>
        </li>
        <li>

        </li>
    </ul>
    <div class="visible-xs">
        <a href="#" class="menu-trigger">
            <i class="entypo-menu"></i>
        </a>
    </div>
</nav>