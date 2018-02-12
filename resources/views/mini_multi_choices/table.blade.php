<table class="table table-hover table-nomargin">
    <tr>
        <th>
            <div class="check">
                <input type="checkbox" class='check_all' data-skin="square" data-color="blue">
            </div>
        </th>
        <th>Question</th>
        <th>Answer</th>
        <th></th>
    </tr>
    @foreach($mini_multi_choices as $mini_multi_choice)
        <tr>
            <td>
                <div class="check">
                    <input type="checkbox" class='check_item' data-skin="square" data-color="blue">
                </div>
            </td>
            <td>
                <a href="{{route('multi-choices.edit', $mini_multi_choice->id)}}">{{str_limit($mini_multi_choice->question, 169)}}</a>
            </td>
            <td>{{$mini_multi_choice->answer}}</td>
            <td><a target="_blank" href="{{route('multi-choices.show', $mini_multi_choice->id)}}"><i class="fa fa-eye-slash"></i></a></td>
        </tr>
    @endforeach
</table>
<div id="linkPaginate">
    {{$mini_multi_choices->links()}}
</div>
