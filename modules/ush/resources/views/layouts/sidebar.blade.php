<li class="has-sub @menu('ush')">
    <a>
        <i class="entypo-gauge"></i>
        <span class="title">uShop</span>
    </a>
    <ul>
        <li class="@sub-menu('ush-category')">
            <a href="{{route('ush-category.index')}}">
                <span class="title">Category</span>
            </a>
        </li>
        <li class="@sub-menu('ush-group')">
            <a href="{{route('ush-group.index')}}">
                <span class="title">Group</span>
            </a>
        </li>
    </ul>
</li>