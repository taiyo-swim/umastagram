@extends('layout')

@section('content')
    <h1>umastagramへようこそ！</h1>
    @can('admin')<!--管理者のみ表示-->
        <h3><a href='{{ route("umastagram.create") }}'>競走馬情報の登録</a></h3>
    @endcan
@endsection