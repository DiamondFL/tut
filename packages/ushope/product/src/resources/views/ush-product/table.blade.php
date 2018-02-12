<table class="table">
    <tr>
        <th><input type="checkbox" class="check_all"></th>
        <th>{{trans('ush-p::label.name')}}</th>
        {{--<th>{{trans('ush-p::label.rate')}}</th>--}}
        {{--<th>{{trans('ush-p::label.no_rate')}}</th>--}}
        <th>{{trans('ush-p::label.ush_category_id')}}</th>
        {{--<th>{{trans('ush-p::label.ush_group_id')}}</th>--}}
        {{--<th>{{trans('ush-p::label.ush_seasonal_id')}}</th>--}}
        <th>{{trans('ush-p::label.ush_feature_id')}}</th>
        <th>{{trans('ush-p::label.ush_material_id')}}</th>
        <th>{{trans('ush-p::label.ush_brand_id')}}</th>
        <th>{{trans('ush-p::label.ush_weight_id')}}</th>
{{--        <th>{{trans('ush-p::label.ush_price_id')}}</th>--}}
{{--        <th>{{trans('ush-p::label.ush_fit_id')}}</th>--}}
{{--        <th>{{trans('ush-p::label.ush_specialty_size_id')}}</th>--}}
        {{--<th>{{trans('ush-p::label.img')}}</th>--}}
        {{--<th>{{trans('ush-p::label.img_plus')}}</th>--}}
        <th>{{trans('ush-p::label.price')}}</th>
        <th>{{trans('ush-p::label.minimum_order')}}</th>
{{--        <th>{{trans('ush-p::label.items')}}</th>--}}
{{--        <th>{{trans('ush-p::label.content')}}</th>--}}

        <th></th>
    </tr>
    @foreach($ushProducts as $row)
        <tr>
            <td><input type="checkbox" class="check_item" data="{{$row->id}}"></td>
            <td>{{$row->name}}</td>
            {{--<td>{{$row->rate}}</td>--}}
            {{--<td>{{$row->no_rate}}</td>--}}
            <td>{{$row->ush_category_id}}</td>
            {{--<td>{{$row->ush_group_id}}</td>--}}
            {{--<td>{{$row->ush_seasonal_id}}</td>--}}
            <td>{{$row->ush_feature_id}}</td>
            <td>{{$row->ush_material_id}}</td>
            <td>{{$row->ush_brand_id}}</td>
            <td>{{$row->ush_weight_id}}</td>
            {{--<td>{{$row->ush_price_id}}</td>--}}
            {{--<td>{{$row->ush_fit_id}}</td>--}}
            {{--<td>{{$row->ush_specialty_size_id}}</td>--}}
            {{--<td>{{$row->img}}</td>--}}
            {{--<td>{{$row->img_plus}}</td>--}}
            <td>{{$row->price}}</td>
            <td>{{$row->minimum_order}}</td>
            {{--<td>{{$row->items}}</td>--}}
            {{--<td>{{$row->content}}</td>--}}

            <td>
                <a href="{{route('ush-product.edit', $row->id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>
                </a>
                <form style="display: inline" class="form-inline" method="POST"
                      action="{{route('ush-product.destroy', $row->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div id="linkPaginate">
    {{$ushProducts->links()}}
</div>
