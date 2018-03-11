@extends('dashboard')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{route('projects.index')}}">Project</a>
        </li>
        <li class="active">
            <strong>Review notify</strong>
        </li>
    </ol>
    <form class="form-group row" id="formFilter" action="{{route('involve.user.sendNotify')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" value="{{$input['project_id']}}" name="project_id">
        @foreach($input['ids'] as $id)
            <input type="hidden" value="{{$id}}" name="ids[]">
        @endforeach
        <div class="form-group">
            <textarea style="width: 500px" name="view" class="form-control">
                {!! $view !!}
            </textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-default"><i class="fa fa-send"></i> Send</button>
        </div>
    </form>
@endsection
@push('js')
<script>
    var options = {
        height: '600px'
    };
    $('textarea').ckeditor(options);
</script>
@endpush