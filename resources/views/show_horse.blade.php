@extends('layout')

@section('content')
    <div class="horse_information">
        <h1>馬名：{{ $horse->name }}</h1><h4>({{ $horse->color }})</h1>
        <h3>父：{{ $horse->father_name }}</h3>
        <h3>母：{{ $horse->mother_name }}</h3><h5>(母父：{{ $horse->mothers_father_name }})</h5>
        <h3>馬主：{{ $horse->owner }}</h3>
        <h3>調教師：{{ $horse->trainer }}</h3>
        <h3>生産者：{{ $horse->producer }}</h3>
        <h3>生年月日：{{ $horse->birthday }}</h3>
        <h3>主な勝ち鞍：{{ $horse->winning }}</h3>
    </div>
    <a href='{{ route("umastagram.edit", ['id' => $horse->id]) }}'>編集</a>
    <a href='{{ route("umastagram.top") }}'>トップページへ</a>
@endsection