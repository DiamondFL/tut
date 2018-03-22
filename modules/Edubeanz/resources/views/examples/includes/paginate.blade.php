@forelse($examples as $example)
<div class="blog-post">
    <div class="post-thumb">
        <a href="{{route('edu.example.detail', $example->id)}}">
            <img src="{{asset('frontd')}}/images/blog-thumb-1.png" class="img-rounded"/>
            <span class="hover-zoom"></span>
        </a>
    </div>
    <div class="post-details">
        <h3>
            <a href="{{route('edu.example.detail', $example->id)}}">{{$example->title}}</a>
        </h3>
        <div class="post-meta">
            <div class="meta-info">
                <i class="entypo-calendar"></i> {{$example->created_at}}
            </div>
            <div class="meta-info">
                <i class="entypo-comment"></i>
                0 comments
            </div>
        </div>
       {!! $example->intro !!}
    </div>
</div>
@empty
    <div class="alert alert-warning">
        empty
    </div>
@endforelse
{!! $examples->links() !!}