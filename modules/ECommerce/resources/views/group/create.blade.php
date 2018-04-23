@extends('eco::layout.main')
@section('title')
    Thêm nhóm
@stop
@section('content')
    <form method="post" action="{{route('group.store')}}">
        {{ csrf_field() }}
        <div class="input-group">
            <span class="input-group-addon"><div class="editGroupLabel">Tên nhóm</div></span>
            <input type="text" name="name" required="" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><div class="editGroupLabel">Hình ảnh</div></span>
            <input type="file" name="picture" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><div class="editGroupLabel">Chú thích</div></span>
            <textarea class='ckeditor' name="note" class="form-control" required=""></textarea>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><div class="editGroupLabel">Active</div></span>
            <input type="checkbox" name="active" checked value="1" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><div class="editGroupLabel"></div></span>
            <input type="submit" required="" value="Thêm" class="form-control btn-primary">
        </div>
    </form>
@stop