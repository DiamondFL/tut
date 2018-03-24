<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('label.doc_news_id')}}</th>
        <th>{{trans('label.doc_tag_id')}}</th>

        <th></th>
    </tr>
    @foreach($docNewsTags as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>{{$row->doc_news_id}}</td>
            <td>{{$row->doc_tag_id}}</td>
            <td>
                <form method="POST" action="{{route('doc-news-tag.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger destroyBtn btn-xs">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="{{route('doc-news-tag.edit', $row->id)}}" class="btn btn-info btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$docNewsTags->links()}}
</div>
