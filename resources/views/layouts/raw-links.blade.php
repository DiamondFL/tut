<div class="col-md-6 col-sm-4 clearfix hidden-xs">
    <ul class="list-inline links-list pull-right">
        <!-- Language Selector -->
        <li>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-language"></i>
            </button>
        </li>
        <li class="sep"></li>
        <li>
            <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                <i class="entypo-chat"></i>
                Chat
                <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
            </a>
        </li>
        <li class="sep"></li>
        <li>
            <form action="{{route('logout')}}" method="post">
                {{csrf_field()}}
                <button  class="navbar-btn btn btn-danger btn-sm">
                    Log Out <i class="entypo-logout right"></i>
                </button>
            </form>
        </li>
    </ul>
</div>