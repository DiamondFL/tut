<div class="col-md-12 col-sm-4 clearfix hidden-xs">
    <ul class="list-inline links-list pull-right">
        <li class="dropdown pull-right">
            <strong>{{ \Auth::user()->name }}</strong>: &nbsp;
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                <i class="entypo-user"></i>
                <i class="entypo-down-open-mini"></i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="{{route('profile')}}">
                        <i class="entypo-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a  href="{{route('logout')}}">
                        <i class="entypo-logout right"></i>Log Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>