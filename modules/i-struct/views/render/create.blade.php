@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route('dbmagic.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">Name space</label>
                    <input type="text" value="{{old('name_space')}}" name="name_space" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Table</label>
                    <input type="text"value="{{old('table')}}" name="table" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Folder</label>
                    <input type="text" value="{{old('path')}}" name="path" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Prefix</label>
                    <input type="text" value="{{old('prefix')}}" name="prefix" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('js')

@endpush