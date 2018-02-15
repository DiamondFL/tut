<li class="has-sub @menu('rg')">
    <a>
        <i class="entypo-gauge"></i>
        <span class="title">Test</span>
    </a>
    <ul>
        <li class="@sub-menu('rg-answer')">
            <a href="{{route('rg-answer.index')}}">
                <span class="title">Answer</span>
            </a>
        </li>
        <li class="@sub-menu('rg-question')">
            <a href="{{route('rg-question.index')}}">
                <span class="title">Question</span>
            </a>
        </li>
        <li class="@sub-menu('rg-reply')">
            <a href="{{route('rg-reply.index')}}">
                <span class="title">Reply</span>
            </a>
        </li>
        <li class="@sub-menu('rg-result')">
            <a href="{{route('rg-result.index')}}">
                <span class="title">Result</span>
            </a>
        </li>
        <li class="@sub-menu('rg-test')">
            <a href="{{route('rg-test.index')}}">
                <span class="title">Test</span>
            </a>
        </li>
    </ul>
</li>