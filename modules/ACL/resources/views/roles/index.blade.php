@extends('layouts.app')
@section('content')
    <ol class="breadcrumb bc-3">
        <li>
            <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li>
            <a>Tables</a>
        </li>
        <li class="active">

            <strong>Basic Tables</strong>
        </li>
    </ol>
    <form class="form-group row" id="formFilter" action="{{route('roles.index')}}" method="POST">
        <div class="col-sm-2 form-group">
            <select name="per_page" class="form-control inputFilter">
                <option value="">10</option>
                <option value="">20</option>
                <option value="">30</option>
                <option value="">40</option>
                <option value="">50</option>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="name" class="form-control inputFilter" placeholder="name">
        </div>
        <div class="col-sm-3 form-group">
            <input type="text" name="display_name" class="form-control inputFilter" placeholder="display_name">
        </div>
        <div class="col-sm-2 form-group">
            <select name="is_active" class="form-control inputFilter">
                <option value="">All</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <a class="btn btn-primary" href="{{route('roles.create')}}"><i class="fa fa-plus"></i></a>
            <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </div>
    </form>
    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <h3>
                        <i class="icon-table"></i>
                        Basic table
                    </h3>
                </div>
                <div class="box-content nopadding">
                    @include('acl::roles.table')
                </div>
            </div>
        </div>
    </div>
    @include('acl::layouts.modals.permissionList')
@endsection
@push('css')

@endpush
@push('js')
<script>
    var set_role_permission = $('.set_role_permission');
    var role_id = $('#role_id');
    var permission_id = $('.permission_id');
    $(document).on('click', '.set_role_permission', function () {
        var id = $(this).attr('data');
        role_id.val(id);
        assignedPermission(id);
    });
    function assignedPermission(id) {
        $.ajax({
            url: '{{route('involve.role.assignedPermission')}}',
            method: 'GET',
            data: {id: id},
            success: function (data) {
                //alert(data);
                setChecked(data);
            },
            error: function () {

            }
        });
    }
    function setChecked(data) {
        permission_id.prop('checked', true);
        permission_id.each(function (index) {
            var self = $(this);
            console.log($(this).val());
            var result = $.inArray(self.val(), data);
            if(result !== -1) {
                self.prop('checked', true);
            }
        });
    }
</script>
@endpush