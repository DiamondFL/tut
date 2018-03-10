<li class="has-sub @menu('rg')">
    <a>
        <i class="entypo-gauge"></i>
        <span class="title">ACL</span>
    </a>
    <ul>
        <li class="@sub-menu('permission')">
            <a href="{{route('permissions.index')}}">
                <span class="title">Permission</span>
            </a>
        </li>
        <li class="@sub-menu('roles')">
            <a href="{{route('roles.index')}}">
                <span class="title">Role</span>
            </a>
        </li>
    </ul>
</li>