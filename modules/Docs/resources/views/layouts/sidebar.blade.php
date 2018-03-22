<li class="has-sub @menu('doc')">
    <a>
        <i class="entypo-gauge"></i>
        <span class="title">Doc</span>
    </a>
    <ul>
        <li class="{{ request()->is('doc-lesson*') ? 'active' : ''}}">
            <a href="{{route('doc-lesson.index')}}">
                <span class="title">Lesson</span>
            </a>
        </li>
        <li class="{{ request()->is('doc-example*') ? 'active' : ''}}">
            <a href="{{route('doc-example.index')}}">
                <span class="title">Example</span>
            </a>
        </li>
        <li class="{{ request()->is('doc-language*') ? 'active' : ''}}">
            <a href="{{route('doc-language.index')}}">
                <span class="title">Language</span>
            </a>
        </li>
        <li class="{{ request()->is('doc-package*') ? 'active' : ''}}">
            <a href="{{route('doc-package.index')}}">
                <span class="title">Package</span>
            </a>
        </li >
        <li class="{{ request()->is('doc-project*') ? 'active' : ''}}">
            <a href="{{route('doc-project.index')}}">
                <span class="title">Project</span>
            </a>
        </li>
        <li class="{{ request()->is('doc-tag*') ? 'active' : ''}}">
            <a href="{{route('doc-tag.index')}}">
                <span class="title">Tag</span>
            </a>
        </li>
    </ul>
</li>