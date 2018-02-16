<nav class="site-nav">
    <ul class="main-menu hidden-xs" id="main-menu">
        <li class="active">
            <a href="/">
                <span>Trang chủ</span>
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
                <span>Bài test</span>
            </a>
        </li>
        <li>
            <a href="{{route('edu.language.list')}}">
                <span>Tiếng Anh</span>
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
        <li class="search">
            <a href="#">
                <i class="entypo-search"></i>
            </a>
            <form method="get" class="search-form" action="" enctype="application/x-www-form-urlencoded">
                <input type="text" class="form-control" name="q" placeholder="Type to search..." />
            </form>
        </li>
    </ul>
    <div class="visible-xs">
        <a href="#" class="menu-trigger">
            <i class="entypo-menu"></i>
        </a>
    </div>
</nav>