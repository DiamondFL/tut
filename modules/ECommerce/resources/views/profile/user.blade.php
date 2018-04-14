@extends('eco::layout.main')
@section('content')
    {{$user->username}}<br>
    {{$user->email}}
@endsection