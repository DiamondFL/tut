<li class="has-sub">
    <a>
        <i class="entypo-gauge"></i>
        <span class="title">Tutorial</span>
    </a>
    <ul>
        <li class="{{ request()->is('tutorial*') ? 'active' : ''}}">
            <a href="{{route('tutorial.index')}}">
                <span class="title">Tutorial</span>
            </a>
        </li>
        <li class="{{ request()->is('tutorial-test*') ? 'active' : ''}}">
            <a href="{{route('tutorial-test.index')}}">
                <span class="title">Tutorial Test</span>
            </a>
        </li>
        <li class="{{ request()->is('tutorial-result*') ? 'active' : ''}}">
            <a href="{{route('tutorial-result.index')}}">
                <span class="title">Tutorial Result</span>
            </a>
        </li>
        <li class="{{ request()->is('section*') ? 'active' : ''}}">
            <a href="{{route('section.index')}}">
                <span class="title">Section</span>
            </a>
        </li>
        <li class="{{ request()->is('section-test*') ? 'active' : ''}}">
            <a href="{{route('section-test.index')}}">
                <span class="title">Section test</span>
            </a>
        </li>
        <li class="{{ request()->is('section-result*') ? 'active' : ''}}">
            <a href="{{route('section-result.index')}}">
                <span class="title">Section result</span>
            </a>
        </li>
        <li class="{{ request()->is('lesson*') ? 'active' : ''}}">
            <a href="{{route('lesson.index')}}">
                <span class="title">Lesson</span>
            </a>
        </li>
        <li class="{{ request()->is('lesson-test*') ? 'active' : ''}}">
            <a href="{{route('lesson-test.index')}}">
                <span class="title">Lesson Test</span>
            </a>
        </li>
        <li class="{{ request()->is('lesson-result*') ? 'active' : ''}}">
            <a href="{{route('lesson-result.index')}}">
                <span class="title">Lesson Result</span>
            </a>
        </li>
        <li class="{{ request()->is('lesson-comment*') ? 'active' : ''}}">
            <a href="{{route('lesson-comment.index')}}">
                <span class="title">Lesson Comment</span>
            </a>
        </li>
        <li class="{{ request()->is('lesson-feed-back*') ? 'active' : ''}}">
            <a href="{{route('lesson-feed-back.index')}}">
                <span class="title">Lesson Feed Back</span>
            </a>
        </li>
    </ul>
</li>