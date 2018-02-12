<table class="table">
    <tr>
        <th>{{trans('label.title')}}</th>
        <th>{{trans('label.views')}}</th>
        <th>{{trans('label.source')}}</th>
        <th>{{trans('label.last_view')}}</th>
        <th>{{trans('label.is_active')}}</th>
        <th>{{trans('label.is_hot')}}</th>
        <th>{{trans('label.creator')}}</th>
        <th>{{trans('label.updater')}}</th>

        <th></th>
    </tr>
    @foreach($news as $row)
        <tr>
            <td><a href="{{route('news.edit', $row->id)}}">{{$row->title}}</a></td>
            <td>{{$row->views}}</td>
            <td>{{$row->source}}</td>
            <td>{{$row->last_view}}</td>
            <td>{{$row->is_active}}</td>
            <td>{{$row->is_hot}}</td>
            <td>{{$row->creator}}</td>
            <td>{{$row->updater}}</td>

            <td><a href="{{route('news.show', $row->id)}}"><i class="fa fa-eye-slash"></i></a></td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$news->links()}}
</div>
