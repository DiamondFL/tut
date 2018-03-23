<li class="has- @menu('rg')">
    <a>
        <i class="entypo-gauge"></i>
        <span class="title">ACL</span>
    </a>
    <ul>
        <li class="@-menu('permission')">
            <a href="{{route('permissions.index')}}">
                <span class="title">Permission</span>
            </a>
        </li>
        <li class="@-menu('roles')">
            <a href="{{route('roles.index')}}">
                <span class="title">Role</span>
            </a>
        </li>
        <li class="@-menu('users')">
            <a href="{{route('users.index')}}">
                <span class="title">User</span>
            </a>
        </li>
    </ul>
</li>